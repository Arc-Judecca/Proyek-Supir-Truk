<?php

namespace App\Forms;

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
            ->add('nota_pdf', 'file', [
                'label' => 'Upload Nota (PDF)',
                'attr' => ['accept' => '.pdf'],
                'rules' => 'nullable|mimes:pdf|max:2048',
            ])
            ->add('submit', 'submit', ['label' => 'Tambah Supir']);
    }
}

