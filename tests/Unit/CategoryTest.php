<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testIfUseTraits()
    {
        $traits = [
            SoftDeletes::class,
            Uuid::class
        ];
        $categoryTrait = array_keys(class_uses((Category::class)));
        $this->assertEquals($traits, $categoryTrait);
        //print_r(class_uses((Category::class)));
    }

    public function testFillableAttribute()
    {
        $fillable = [
            'name',
            'description',
            'is_active'
        ];
        $category = new Category();
        $this->assertEquals($fillable, $category->getFillable());
    }

    public function testDatesAttribute()
    {
        $dates = ['created_at', 'updated_at', 'deleted_at'];
        $category = new Category();
        $categoryDates = $category->getDates();
        foreach($dates as $date) {
            $this->assertContains($date, $categoryDates);
        }
        $this->assertCount(count($dates), $categoryDates);
    }

    public function testKeyType()
    {
        $keyType = 'string';
        $category = new Category();
        $this->assertEquals($keyType, $category->getKeyType());
    }

    public function testCasts()
    {
        $casts = [
            'id' => 'string'
        ];
        $category = new Category();
        $this->assertEquals($casts, $category->getCasts());
    }

    public function testIncrementing()
    {
        $category = new Category();
        $this->assertFalse($category->incrementing);
    }
}