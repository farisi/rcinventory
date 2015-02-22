<?php
class MY_Parser extends CI_Parser {

    /**
     *  Parse a template string, which is NOT a file but
     *  is e.g. a result of a database query
     *
     * Parses pseudo-variables contained in the specified template,
     * replacing them with the data in the second param
     *
     * @access    public
     * @param    string
     * @param    array
     * @param    bool
     * @return    string
     * aug 2010 by yussaq nurfitrianto (useaxes@gmail.com)
     */
    function parse_string($template, $data=array(), $return = FALSE){
        $CI =& get_instance();
        $template = $CI->load->view($template, $data, TRUE);
        if ($template == ''){
            return FALSE;
        }

        foreach ($data as $key => $val){
            if (is_array($val))
            {
                $template = $this->_parse_pair($key, $val, $template);
            }else{
                $template = $this->_parse_single($key, (string)$val, $template);
            }
        }

        if ($return == FALSE){
            $CI->output->append_output($template);
        }
        return $template;
    }
}
?>
