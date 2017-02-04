<?php

class Fotos extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function saveFotos(){

        if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {

            $permitidos = array(
                'image/jpg',
                'image/jpeg',
                'image/png',
                'image/gif');
            //ve se realmente e imagem

            if (in_array($_FILES['arquivo']['type'], $permitidos )){
                //salvar o arquivo
                if ($_FILES['arquivo']['type'] == 'image/jpg' || 'image/jpeg') {
                    $nome = md5(time().rand(0, 999)).'.jpg';
                }else if ($_FILES['arquivo']['type'] == 'image/png') {
                    $nome = md5(time().rand(0, 999)).'.png';
                }else {
                    $nome = md5(time().rand(0, 999)).'.gif';
                }

                move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/images/galeria/'. $nome);

                $titulo = '';

                if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
                    $titulo = addslashes($_POST['titulo']);
                }

                $sql = "INSERT INTO fotos SET titulo = '$titulo', url = '$nome'";

                $this->db->query($sql);
            }


        }
    }

    public function getFotos() {
        $array = array();

        $sql = "SELECT * FROM fotos ORDER BY id DESC";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

}

?>
