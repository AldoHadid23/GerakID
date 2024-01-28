<?php

namespace App\Models;

class Event
{
    private static $events = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Aldo Fernanda Hadid",
            "body" => "  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum facere quisquam deserunt quis impedit tenetur iusto sunt porro. Perferendis maiores iste cumque. Saepe magnam minus, quaerat rem aperiam repudiandae. Assumenda eum placeat porro excepturi vel natus aperiam atque repudiandae reprehenderit temporibus exercitationem dolorum, corporis quas dolore eius omnis praesentium ducimus cupiditate a necessitatibus odio quo labore consectetur? Repellat, magni debitis. Fugiat provident eius sit atque, numquam labore expedita blanditiis quam dolor dolores iste, suscipit pariatur saepe quod rem magni quae nulla culpa porro animi mollitia sint necessitatibus voluptate impedit. Cumque, eius. Commodi, totam nulla. Architecto blanditiis sit consequuntur inventore in similique rerum dignissimos sint quasi aliquid. Officiis nulla, cumque magni, accusantium ipsam inventore impedit quibusdam blanditiis similique labore et explicabo!"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Gojo Satoru",
            "body" => "  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum facere quisquam deserunt quis impedit tenetur iusto sunt porro. Perferendis maiores iste cumque. Saepe magnam minus, quaerat rem aperiam repudiandae. Assumenda eum placeat porro excepturi vel natus aperiam atque repudiandae reprehenderit temporibus exercitationem dolorum, corporis quas dolore eius omnis praesentium ducimus cupiditate a necessitatibus odio quo labore consectetur? Repellat"
        ]
    ];

    public static function all()
    {
        return collect(self::$events);
    }

    public static function find($slug)
    {
        $event = static::all();
        return $event->firstWhere('slug', $slug);
    }
}
