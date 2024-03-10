<?php

namespace app\Forms;

use Kris\LaravelFormBuilder\Form;

class SupirForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('id_supir', 'text', [
                'label' => 'ID Supir',
                'rules' => 'required',
            ])
            ->add('nama_supir', 'text', [
                'label' => 'Nama Supir',
                'rules' => 'required',
            ])
            ->add('submit', 'submit', ['label' => 'Tambah Supir']);
    }
}
