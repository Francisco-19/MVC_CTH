<?php
    //metodos interface pra usar en otros metodos diferentes
    interface IModel{
        public function save();
        public function getAll();
        public function get($idusuario);
        public function delete($idusuario);
        public function update();
        public function from($array);
    }
?>