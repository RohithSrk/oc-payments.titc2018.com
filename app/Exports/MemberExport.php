<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MemberExport implements FromView
{
	public $members;

	public function __construct($members){
		$this->members = $members;
	}

	public function view(): View
	{
		return view('layouts.members-table', ['members' => $this->members ]);
	}
}