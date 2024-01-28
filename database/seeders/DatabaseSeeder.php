<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Aldo Fernanda Hadid',
            'username' => 'aldo_hadid',
            'email' => 'aldohadid23@gmail.com',
            'password' => bcrypt('password')
        ]);

        // User::create([
        //     'name' => 'Sherly Sandaa',
        //     'email' => 'sherly20@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Carier',
            'slug' => 'Carier'
        ]);

        Category::create([
            'name' => 'Workshop',
            'slug' => 'workshop'
        ]);

        Category::create([
            'name' => 'Comic Con',
            'slug' => 'comic-con'
        ]);

        Event::factory(20)->create();

        // Event::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur aspernatur, expedita atque maiores culpa ipsum placeat ullam maxime ducimus.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur aspernatur, expedita atque maiores culpa ipsum placeat ullam maxime ducimus. Veritatis laudantium quidem, aperiam saepe recusandae nam, perspiciatis nisi eveniet vitae inventore quibusdam corporis delectus laborum excepturi nesciunt. </p><p>Sapiente, labore, perspiciatis deserunt aliquid doloremque odio veritatis beatae praesentium optio dolorum odit! Autem architecto doloremque amet quam et voluptate odio deleniti dignissimos tenetur, non accusamus dolor itaque mollitia unde consectetur alias reiciendis veritatis corporis quis, possimus porro omnis. Labore quidem rem at.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Event::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur aspernatur, expedita atque maiores culpa ipsum placeat ullam maxime ducimus.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur aspernatur, expedita atque maiores culpa ipsum placeat ullam maxime ducimus. Veritatis laudantium quidem, aperiam saepe recusandae nam, perspiciatis nisi eveniet vitae inventore quibusdam corporis delectus laborum excepturi nesciunt. </p><p>Sapiente, labore, perspiciatis deserunt aliquid doloremque odio veritatis beatae praesentium optio dolorum odit! Autem architecto doloremque amet quam et voluptate odio deleniti dignissimos tenetur, non accusamus dolor itaque mollitia unde consectetur alias reiciendis veritatis corporis quis, possimus porro omnis. Labore quidem rem at.</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);     

        // Event::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur aspernatur, expedita atque maiores culpa ipsum placeat ullam maxime ducimus.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur aspernatur, expedita atque maiores culpa ipsum placeat ullam maxime ducimus. Veritatis laudantium quidem, aperiam saepe recusandae nam, perspiciatis nisi eveniet vitae inventore quibusdam corporis delectus laborum excepturi nesciunt. </p><p>Sapiente, labore, perspiciatis deserunt aliquid doloremque odio veritatis beatae praesentium optio dolorum odit! Autem architecto doloremque amet quam et voluptate odio deleniti dignissimos tenetur, non accusamus dolor itaque mollitia unde consectetur alias reiciendis veritatis corporis quis, possimus porro omnis. Labore quidem rem at.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);    

        // Event::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur aspernatur, expedita atque maiores culpa ipsum placeat ullam maxime ducimus.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur aspernatur, expedita atque maiores culpa ipsum placeat ullam maxime ducimus. Veritatis laudantium quidem, aperiam saepe recusandae nam, perspiciatis nisi eveniet vitae inventore quibusdam corporis delectus laborum excepturi nesciunt. </p><p>Sapiente, labore, perspiciatis deserunt aliquid doloremque odio veritatis beatae praesentium optio dolorum odit! Autem architecto doloremque amet quam et voluptate odio deleniti dignissimos tenetur, non accusamus dolor itaque mollitia unde consectetur alias reiciendis veritatis corporis quis, possimus porro omnis. Labore quidem rem at.</p>',
        //     'category_id' => 3,
        //     'user_id' => 1
        // ]);    
    }
}
