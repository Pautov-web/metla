<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    	// $one_perms = ['admin-panel' => 'Доступ в админ панель', 'settings' => 'Доступ к настройкам'];
    	// foreach ($one_perms as $perm => $title) {
     //    	$permission = new Permission();
	    //     $permission->name = $title;
	    //     $permission->slug = $perm;
	    //     $permission->save();
	    //     $permission->roles()->attach(3);
	    // }

    	
        // $models = ['role' => 'Роль', 'currency' => 'Валюта', 'cause' => 'Причина', 'article' => 'Статья', 'user' => 'Пользователь', 'faq' => 'FAQ', 'feedback' => 'Вопросы от пользователя', 'review' => 'Отзыв', 'service' => 'Услуга'];
        $models = ['option' => 'Опция'];

        foreach ($models as $model => $title) {
        	$permission = new Permission();
	        $permission->name = $title . ' просмотр списка';
	        $permission->slug = $model . '-view-any';
	        $permission->save();
	        $permission->roles()->attach(3);


	        $permission = new Permission();
	        $permission->name = $title . ' просмотр записи';
	        $permission->slug = $model . '-view';
	        $permission->save();
	        $permission->roles()->attach(3);


	        $permission = new Permission();
	        $permission->name = $title . ' создание записи';
	        $permission->slug = $model . '-create';
	        $permission->save();
	        $permission->roles()->attach(3);


	        $permission = new Permission();
	        $permission->name = $title . ' обновление записи';
	        $permission->slug = $model . '-update';
	        $permission->save();
	        $permission->roles()->attach(3);


	        $permission = new Permission();
	        $permission->name = $title . ' удаление записи';
	        $permission->slug = $model . '-delete';
	        $permission->save();
	        $permission->roles()->attach(3);
        }
    }
}
