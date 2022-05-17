<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{
    private $_JS;
    private $_JS_RAW = array();
    private $_CSS;
    protected $_user = null;
    protected $_user_groups = null;

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        $controller = $this->router->fetch_class();
        $method = $this->router->fetch_method();
       /**
        * Set no-cache headers so pages are never cached by the browser.
        * This is necessary because if the browser caches a page, the
        * login or logout link and user specific data may not change when
        * the logged in status changes.
        */
        header("Expires: Sun, 24 Feb 1980 04:20:00 GMT");
        header("Cache-Control: private, no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

    }

    // Output JSON string
    protected function render_json($data, $code = 200)
    {
        $this->output
            ->set_status_header($code)
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
            
        // force output immediately and interrupt other scripts
        global $OUT;
        $OUT->_display();
        exit;
    }

    // automatic render view sesuai folder controller dan file method
    protected function render($data=array(), $view='', $returnhtml = FALSE)
    {
        $directory = $this->router->fetch_directory();
        $controller = $this->router->fetch_class();
        $method = $this->router->fetch_method();
        if (!$view)
        {
            $view = "$controller/$method";
            if ($directory) $view = $directory.$view;

            $view = strtolower($view);
        }

        if ($this->_JS) $data['js'] = $this->_JS;
        if ($this->_JS_RAW) $data['js_raw'] = $this->_JS_RAW;
        if ($this->_CSS) $data['css'] = $this->_CSS;

        if (!isset($data['page_title']))
        {
            $data['page_title'] = 'APP ADMIN';
        }

        if ($returnhtml)
        {
            return $this->load->view($view, $data, true);
        }
        else
        {
            $this->load->view($view, $data);
        }
    }

    // Add script files, either append or prepend to $this->_JS array
    // ($files can be string or string array)
    protected function add_js($files, $append = TRUE, $position = 'foot')
    {
        $files = is_string($files) ? array($files) : $files;
        $position = ($position==='head' || $position==='foot') ? $position : 'foot';

        if ($append)
        {
            if (isset($this->_JS[$position])) $this->_JS[$position] = array_merge($this->_JS[$position], $files);
            else $this->_JS[$position] = $files;
        }
        else
        {
            if (isset($this->_JS[$position])) $this->_JS[$position] = array_merge($files, $this->_JS[$position]);
            else $this->_JS[$position] = $files;
        }
            
    }

    // Add stylesheet files, either append or prepend to $this->_CSS array
    // ($files can be string or string array)
    protected function add_css($files, $append = TRUE, $media = 'screen')
    {
        $files = is_string($files) ? array($files) : $files;

        if ($append)
        {
            if (isset($this->_CSS[$media])) $this->_CSS[$media] = array_merge($this->_CSS[$media], $files);
            else $this->_CSS[$media] = $files;
        }
        else
        {
            if (isset($this->_CSS[$media])) $this->_CSS[$media] = array_merge($files, $this->_CSS[$media]);
            else $this->_CSS[$media] = $files;
        }
    }

    protected function add_js_raw($js)
    {
        if (!$js) return false;

        $this->_JS_RAW[] = $js;
    }
    
}
