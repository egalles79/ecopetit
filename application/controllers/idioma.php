<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Idioma extends CI_Controller {
 
    public function __construct()
    {

        parent::__construct();

    }

    function index()
    {

        $data['cambia_idioma'] = $this->cambia_idioma();
 
        $this->load->view('idioma',$data);

    }

    //procesamos el formulario 
    public function formulario()
    {
        //como vemos todos los datos son proporcionados por el archivo 
        //de idiomas que hemos solicitado a través de la url
        $this->form_validation->set_rules(lang('idioma.input_nombre'),
                                          lang('idioma.label_nombre'),
                                          'required|min_length[5]|max_length[100]');

        $this->form_validation->set_rules(lang('idioma.input_password'),
                                          lang('idioma.label_password'),
                                          'required|min_length[6]|max_length[100]|matches[repassword]');

        $this->form_validation->set_rules(lang('idioma.input_repassword'),
                                          lang('idioma.label_repassword'), 
                                          'required');


        $this->form_validation->set_rules(lang('idioma.input_email'),
                                          lang('idioma.label_email'),  
                                          'required|valid_email');

        //si no se cumplen las reglas de validación mostramos los errores
        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        //en otro caso procesamos los datos contra la tabla indicada, que nos
        //lo dirá la variable idioma, que contiene el primer segmento de la url,
        //si es en insertaremos en la tabla usuarios_en, si es es en usuarios_es
        else
        {

            $nombre = $this->input->post(lang('idioma.input_nombre'));
            $password = sha1($this->input->post(lang('idioma.input_password')));
            $email = $this->input->post(lang('idioma.input_email'));
            $idioma = $this->input->post('idioma');

            //si se insertan los datos correctamente redirigimos a 
            //http://localhost/multi_idioma/$idioma/home
            if($this->idioma_model->nuevo_usuario($nombre,$password,$email,$idioma))
            {
                $this->session->set_flashdata('registrado','El registro fue correcto, bienvenido');
                redirect(base_url($idioma.'/home'),'refresh');
            }

        }
    }

    //cambiamos el valor del select dependiendo del primer segmento de la url
    public function cambia_idioma()
    {
    ?>
        <select class="escoge_idioma">
        <?php
        if($this->uri->segment(1) == "es")
        {
        ?>
            <option value="<?=base_url()?>es/idioma">ES</option> 
            <option value="<?=base_url()?>ca/idioma">CA</option>'?>
        <?php
        }else{
            ?>
            <option value="<?=base_url()?>en/idioma">EN</option> 
            <option value="<?=base_url()?>ca/idioma">CA3</option>'?>
        <?php
        }
        ?>
        </select>
    <?php
    }
}