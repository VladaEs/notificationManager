<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CompanyUsers;
class UserCompanySelect extends Component
{
    public int|null $user= null;

    public int|null $companyId = null;
    public $dataArr = null;
    public string|null $textValueName = null;

    public function mount($userId, $dataArr=[], $textValueName = 'name'){
        $this->user = $userId;
        $this->dataArr = $dataArr; 
        $this->textValueName = $textValueName;
    }

public function updatedCompanyId($value)
{
    dd($value); // будет срабатывать при изменении select
}
 
    // ...



    public function render()
    {
        return view('livewire.user-company-select');
    }
}
