<?php


/** Side Bar item active */

function setActive(array $route)
{
    if (is_array($route)) {
        foreach ($route as $r) {
            if (request()->routeIs($r)) {
                return 'active';
            }
        }
    }
}

/** Check if Product have discount */

function checkDiscount($product)
{
    $currentDate = date('Y-m-d');
    if ($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date) {
        return true;
    } else
        return false;
}

/** Calculate discount Percent */

function calculateDiscoutPercent($originalPrice, $discountPrice){
    $discountAmount= $originalPrice - $discountPrice;
    $discountPercent= ($discountAmount / $originalPrice ) * 100;

    return $discountPercent;
}

/** Check The product Type */
function productType($type) {
     switch ($type) {
                    case 'new_arrival':
                        return 'New';

                    case 'featured_product':
                        return 'Featured';

                    case 'top_product':
                        return 'Top';

                    case 'best_product':
                        return 'Best';

                    default:
                        return '';
                        break;
                }

}