<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class VisitorModel extends Model
{
	protected $table                = 'visitor';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['ipaddress','date','hits','online'];

	public function getStatistikVisitor($ipaddress)
	{
		$request = \Config\Services::request();
		$date = new Time('now');
		$checkVisitorToday = $this->where('ipaddress',$ipaddress)->where('date',$date->toDateString())->first();
		if (!$checkVisitorToday) {
			$this->save([
				'ipaddress'=>$ipaddress,
				'date'=>$date,
				'hits'=>1,
				'online'=>$date,
			]);
		}else{
			$this->save([
				'id'=>$checkVisitorToday['id'],
				'hits'=>$checkVisitorToday['hits'] + 1,
				'online'=>$date,
			]);
		}
		$amountVisitorToday = $this->where('date',$date->toDateString())->groupBy('ipaddress')->countAllResults();

		$totalVisitor = $this->countAll();

		$limitTime = $date->subMinutes(3);

		$onlineVisitor = $this->where('online >',$limitTime)->countAllResults();

		$data = [
			'amountVisitorToday'=>$amountVisitorToday,
			'totalVisitor'=>$totalVisitor,
			'onlineVisitor'=>$onlineVisitor,
		];

		// dd($data);
		return $data;
	}
}
