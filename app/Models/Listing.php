<?php
    namespace App\Models;

    class Listing {
        public static function all() {
            return [
                [
                    'id'=> '1',
                    'title'=> 'Listing One',
                    'description'=> 'Ut gubergren diam elitr diam et. Et consetetur invidunt dolores sed voluptua sit. Et erat dolore kasd ipsum diam diam.',
                ],
                [
                    'id'=> '2',
                    'title'=> 'Listing Two',
                    'description'=> 'Aus neu entwöhntes jenem zerstoben widerklang auf selbst. Schwankende der der gestalten sich früh denen nun. Ersten sich es herauf.',
                ]
            ];
        }
        public static function find($id) {
            $listings = self::all();

            foreach($listings as $listing) {
                if($listing['id'] == $id) {
                    return $listing;
                }
            }
        }   
    }