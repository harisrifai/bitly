<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Komputer;
use Livewire\WithPagination;
class Komputers extends Component
{
    public function render()
    {
        $this->komputers = Komputer::all();
        return view('livewire.komputer.index');
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
         
    }

    public function openModal()
    {
         
        $this->isOpen = true;
    }

    public function closeModal()
    {
         
        $this->isOpen = false;
    }

    public function resetInputFields()
    {
         
        $this->user_id='';
        $this->ip_komp='';
        $this->host_name='';
        $this->mac_address='';
        $this->os_version='';
        $this->model_build='';
        $this->processor_type='';
        $this->dept_name='';
        
    }

    public function store()
    {
            $this->validate([
                'user_id'=>'required',
                'ip_komp'=>'required',
                'host_name'=>'required',
                'mac_address'=>'required',
                'os_version'=>'required',
                'model_build'=>'required',
                'processor_type'=>'required',
                'dept_name'=>'required',

            ]);
            $komputer::updateOrCreate(['id' => $this->komputer_id],[
                'user_id'=>$this->user_id,
                'ip_komp'=>$this->ip_komp,
                'host_name'=>$this->host_name,
                'mac_address'=>$this->mac_address,
                'os_version'=>$this->os_version,
                'model_build'=>$this->model_build,
                'processor_type'=>$this->processor_type,
                'dept_name'=>$this->dept_name
            ]);
            session()->flash('message', $this->komputer_id ? 'Update Successfuly': ' Created Successfully.');

            $this->closeModal();
            $this->resetInputFields();
        }
        public function edit($id)
        {
        $komputer = Komputer::findOrFail($id);
        $this->komputer_id = $id; 
        $this->ip_komp= $komputer->ip_komp;
        $this->host_name= $komputer->host_name;
        $this->mac_address= $komputer->mac_address;
        $this->os_version= $komputer->os_version;
        $this->model_build= $komputer->model_build;
        $this->processor_type= $komputer->processor_type;
        $this->dept_name= $komputer->dept_name;
        $this->openModal();
        }
        public function delete($id)
        {
            Komputer::find($id)->delete();
        session()->flash('message', 'komputer Deleted Successfully.');
        }
    }

