<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Advert
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $category
 * @property string $incident_date
 * @property string $phone
 * @property string $address
 * @property string $fee
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert whereIncidentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Advert whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read int|null $images_count
 */
class Advert extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function firstImg()
    {
        return !$this->images->isEmpty() ? '/image/' . $this->images[0]->name : '/image/no-image.jpg';
    }

    public function cropImg()
    {
        return !$this->images->isEmpty() ? '/image/crop' . $this->images[0]->name : '/image/no-image.jpg';
    }
}
