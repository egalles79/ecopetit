<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class sitemap extends CI_Controller  {
  /**
   *  Updates Sitemap.xml when called from the command line. Not available via URL
   */
  public function generate_sitemap()
  {
    // If not a command line request
    if( ! $this->input->is_cli_request())
    {
      // 404 error or maybe just redirect somewhere else
      show_404();
    }
    else
    {
      $this->load->library('PP_sitemap');
      $this->pp_sitemap->create();
    }
  }

}