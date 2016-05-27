<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Favorite extends Model
{
  protected $table = 'favorites';
  protected $fillable = ['user_id', 'movie_id', 'movie_title', 'movie_poster'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */

  public $timestamps = true;

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
