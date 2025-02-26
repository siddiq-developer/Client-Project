
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder {
    public function run() {
        DB::table('blogs')->insert([
            [
                'title' => 'ARTICLE 1: Name, Geographical Presence, and Applicability',
                'content' => '1.1 These are the Bylaws for the Chapter, which shall be called “The Pakistan Islamabad 
                Chapter of the Internet Society” (the “Chapter”), a chapter of the Internet Society (the 
                “Internet Society” or “ISOC”).',
                'author' => 'ISOC',
                'date' => now(),
                'type' => 'bylaws'
            ],
            [
                'title' => 'ARTICLE 2: Terms and Definitions',
                'content' => 'For the context of this document, terms mentioned below have the following meanings: Active member, Affiliate member ...',
                'author' => 'ISOC',
                'date' => now(),
                'type' => 'bylaws'
            ],
            [
                'title' => 'ARTICLE 3: Purpose, Objectives, Operations, and Membership',
                'content' => 'The general purpose of the Chapter shall be to advance and promote the guiding principles of ISOC ...',
                'author' => 'ISOC',
                'date' => now(),
                'type' => 'bylaws'
            ],
            [
                'title' => 'ARTICLE 4: General Assembly - Authority and Operation',
                'content' => 'The General Assembly is the sovereign body of the Chapter that includes all its members ...',
                'author' => 'ISOC',
                'date' => now(),
                'type' => 'bylaws'
            ],
            [
                'title' => 'ARTICLE 5: Board of Directors - Authority and Operation',
                'content' => 'The Board of Directors (BoD) shall serve as the governing body giving strategic direction to the Chapter ...',
                'author' => 'ISOC',
                'date' => now(),
                'type' => 'bylaws'
            ],
        ]);
    }
}
