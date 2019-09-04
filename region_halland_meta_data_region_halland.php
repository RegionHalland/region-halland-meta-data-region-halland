<?php

	/**
	 * @package Region Halland Meta Data Region Halland
	 */
	/*
	Plugin Name: Region Halland Meta Data Region Halland
	Description: Front-end-plugin som returnerar metadata om applikationen
	Version: 1.1.0
	Author: Roland Hydén
	License: GPL-3.0
	Text Domain: regionhalland
	*/

	// Returnerar korrekt titel för en sida
	function get_region_halland_meta_data_region_halland_title()
	{
		
		// Aktuell sida
		global $post;

		// Hämta aktuell post_type
		$myPostType = get_post_type();
		
		// Starta med en tom title-variabel
		$myTitle = "";

		// Hämta sitens namn från env-filen 
		$mySiteName = ENV('SITE_NAME');

		// Om det är en sida
		if ($myPostType == 'page') {
			
			// Används sidans titel + sajtens namn
			$myTitle = $post->post_title . " - " . $mySiteName;
		
		} else {

			// Används namnet på post_type + sajtens namn
			$myTitle = $myPostType . " - " . $mySiteName;

		}

		// Returnera sidans titel
		return $myTitle;

	}

	// Returnerar korrekt titel för en sida
	function get_region_halland_meta_data_region_halland_description($myWords = 25)
	{
		
		// Aktuell sida
		global $post;

		// Starta med tom variabel fär beskrivning
		$myDescription = "";

		// Hämta default beskrivning från env-fil
		$myDefaultDescription = ENV('SITE_DESCRIPTION');

		// Hämta aktuell post_type
		$myPostType = get_post_type();

		// Gör olika beroende på post_type
		switch ($myPostType) {
			
			// Om det är en sida
			case 'page':
				
				// Hämta först ingress
				$myIngess = get_field('name_1000109', $post->ID);
				
				// Om ingressen har ett värde, använd detta
				if (strlen($myIngess) > 0) {
					$myDescription = $myIngess;
				
				// Om ingressen är tom
				} else {
					
					// Om the_content har ett värde, använd detta
					if (strlen($post->post_content) > 0) {
						
						// Ta bort taggar 0 trimma det till 25 ord
						$myContent = wp_strip_all_tags($post->post_content);
						$myContent = wp_trim_words($myContent, $myWords, "");
						
						// Placera the_content i variabeln
						$myDescription = $myContent;

					} else {
						
						// Annars använd default beskrivning
						$myDescription = $myDefaultDescription;
					
					}
				}
				break;
			
			// Annars använd default beskrivning	
			default:
				$myDescription = $myDefaultDescription;
				break;
		}

		// Returnera sidans beskrivning
		return $myDescription;

	}

	// Metod som anropas när pluginen aktiveras
	function region_halland_meta_data_region_halland_activate() {
		// Ingenting just nu...
	}

	// Metod som anropas när pluginen avaktiveras
	function region_halland_meta_data_region_halland_deactivate() {
		// Ingenting just nu...
	}
	
	// Vilken metod som ska anropas när pluginen aktiveras
	register_activation_hook( __FILE__, 'region_halland_meta_data_region_halland_activate');
	
	// Vilken metod som ska anropas när pluginen avaktiveras
	register_deactivation_hook( __FILE__, 'region_halland_meta_data_region_halland_deactivate');

?>