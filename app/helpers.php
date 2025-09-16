<?php  

    //models
    use App\Models\SponsorsModel;

    if (!function_exists('getSponsors')) {
    	function getSponsors() {
    		$sponsors = SponsorsModel::orderBy('sponsor_id', 'desc')->get();

    		return $sponsors;
    	}
    }

?>