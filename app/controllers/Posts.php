<?php 
class Posts extends Controller{

    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('users/login');
        }
        //new model instance
        $this->pelangganModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index(){

        $pelanggan = $this->pelangganModel->getPelanggan();
        $data = [
            'pelanggan' => $pelanggan
        ];

        $this->view('posts/index', $data);
    }

    //add new post
    public function add(){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'pel_nama' => trim($_POST['pel_nama']),
                'pel_id_gol' => 1,
                'pel_alamat' => trim($_POST['pel_alamat']),
                'pel_hp' => trim($_POST['pel_hp']),
                'pel_ktp' => trim($_POST['pel_ktp']),
                'pel_seri' => trim($_POST['pel_seri']),
                'pel_meteran' => trim($_POST['pel_meteran']),
                'user_id' => $_SESSION['user_id'],
                'pel_id_user' => $_SESSION['user_id'],
                'pel_nama_err' => '',
                'pel_ktp_err' => '',
                'pel_id_gol_err' => '',
                'pel_alamat_err' => '',
                'pel_hp_err' => '',
                'pel_seri_err' => '',
                'pel_meteran_err' => '',
            ];
            //validate the title
            if(empty($data['pel_nama'])){
                $data['pel_nama_err'] = 'Please enter nama pelanggan';
            }
            //validate the body
            if(empty($data['pel_alamat'])){
                $data['pel_alamat_err'] = 'Please enter alamat';
            }
            //validate the body
            if(empty($data['pel_id_gol'])){
                $data['pel_id_gol_err'] = 'Please enter golongan';
            }            
            if(empty($data['pel_hp'])){
                $data['pel_hp_err'] = 'Please enter hp';
            }
            if(empty($data['pel_ktp'])){
                $data['pel_ktp_err'] = 'Please enter ktp';
            }            
                        if(empty($data['pel_seri'])){
                $data['pel_seri_err'] = 'Please enter seri';
            }                        
                        if(empty($data['pel_meteran'])){
                $data['pel_meteran_err'] = 'Please enter meteran';
            }
            //validate error free
            if(empty($data['pel_nama_err']) && empty($data['pel_alamat_err'])&& empty($data['pel_id_gol_err']) && empty($data['pel_hp_err'])&& empty($data['pel_seri_err'])&& empty($data['pel_ktp_err'])&& empty($data['pel_meteran_err'])){
            if($this->pelangganModel->addPost($data)){
                    flash('post_message', 'Your post have been added');
                    redirect('posts');
                }else{
                    die('something went wrong');
                }
               
                //laod view with error
            }else{
                $this->view('posts/add', $data);
            }
        }else{
            $data = [
                'pel_nama' => (isset($_POST['pel_nama']) ? trim($_POST['pel_nama']) : ''),
                'pel_id_gol' => (isset($_POST['pel_id_gol']) ? trim($_POST['pel_id_gol']) : ''),                
                'pel_alamat' => (isset($_POST['pel_alamat']) ? trim($_POST['pel_alamat']) : ''),
                'pel_hp' => (isset($_POST['pel_hp']) ? trim($_POST['pel_hp']) : ''),
                'pel_ktp' => (isset($_POST['pel_ktp']) ? trim($_POST['pel_ktp']) : ''),
                'pel_seri' => (isset($_POST['pel_seri']) ? trim($_POST['pel_seri']) : ''),
                'pel_meteran' => (isset($_POST['pel_meteran']) ? trim($_POST['pel_meteran']) : ''),                                                                                
            ];

            $this->view('posts/add', $data);
        }
    }

    //show single post 
    public function show($id){
        $pelanggan = $this->pelangganModel->getPelangganById($id);
        $user = $this->userModel->getUserById($pelanggan->pel_id_user);

        $data = [
            'pelanggan' => $pelanggan,
            'user' => $user
        ];

        $this->view('posts/show', $data);
    }

     //edit post
     public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'pel_nama' => trim($_POST['pel_nama']),
                'pel_alamat' => trim($_POST['pel_alamat']),
                'pel_hp' => trim($_POST['pel_hp']),
                'pel_ktp' => trim($_POST['pel_ktp']),
                'pel_seri' => trim($_POST['pel_seri']),
                'pel_meteran' => trim($_POST['pel_meteran']),
                'updated_at' => trim($_POST['updated_at']),
                'user_id' => $_SESSION['user_id'],
                'pel_nama_err' => '',
                'pel_ktp_err' => '',
                'pel_alamat_err' => '',
                'pel_hp_err' => '',
                'pel_seri_err' => '',
            ];
            //validate the title
            if(empty($data['pel_nama'])){
                $data['pel_nama_err'] = 'Please enter nama pelanggan';
            }
            //validate the body
            if(empty($data['pel_alamat'])){
                $data['pel_alamat_err'] = 'Please enter alamat';
            }
            if(empty($data['pel_hp'])){
                $data['pel_hp_err'] = 'Please enter hp';
            }
            if(empty($data['pel_ktp'])){
                $data['pel_ktp_err'] = 'Please enter ktp';
            }            
                        if(empty($data['pel_seri'])){
                $data['pel_seri_err'] = 'Please enter seri';
            }                        

            //validate error free
            if(empty($data['pel_nama_err']) && empty($data['pel_alamat_err'])&& empty($data['pel_hp_err'])&& empty($data['pel_seri_err'])&& empty($data['pel_ktp_err'])){
                if($this->pelangganModel->updatePost($data)){
                    flash('post_message', 'Your post have been updated');
                    redirect('posts');
                }else{
                    die('something went wrong');
                }
               
                //laod view with error
            }else{
                $this->view('posts/edit', $data);
            }
        }else{
            //check for the owner and call method from post model
            $post = $this->pelangganModel->getPelangganById($id);
            if($post->pel_id_user != $_SESSION['user_id']){
                redirect('posts');
            }
            $data = [
                'id' => $id,
                'pel_nama' => $post->pel_nama,
                'pel_alamat' => $post->pel_alamat,
                'pel_hp' => $post->pel_hp,
                'pel_ktp' => $post->pel_ktp,
                'pel_seri' =>$post->pel_seri,
                'pel_meteran' =>$post->pel_meteran,
                'updated_at' =>$post->updated_at,
            ];

            $this->view('posts/edit', $data);
        }
    }
    
    //delete post
    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //check for owner
            $post = $this->pelangganModel->getPelangganById($id);
            if($post->pel_id_user != $_SESSION['user_id']){
                redirect('posts');
            }
            
            //call delete method from post model
            if($this->pelangganModel->deletePelanggan($id)){
                flash('post_message', 'Post Removed');
                redirect('posts');
            }else{
                die('something went wrong');
            }
        }else{
            redirect('posts');
        }
    }
}                            
                        
