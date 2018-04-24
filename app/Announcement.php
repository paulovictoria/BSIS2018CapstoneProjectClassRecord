<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
  protected $fillable = [
      'title', 'body', 'image', 'announcementable_id', 'announcementable_type',
  ];

	public function announcementable()
	{
		return $this->morphTo();
	}
}
