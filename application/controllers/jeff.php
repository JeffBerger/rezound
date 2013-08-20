<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jeff extends CI_Controller {
	
	public function index()
	{
		$view_passed['content_path'] = 'jeff/upload_view';
		$this->load->view('template/general_template_view',$view_passed);
	}
	
	public function uploadpage()
	{
		$this->load->helper('form');
		$view_passed['error'] = '';
		$view_passed['content_path'] = 'jeff/upload_view';
		$this->load->view('template/general_template_view',$view_passed);
	}
	
	public function uploadhandler()
	{
		$this->load->helper('form');
		$view_passed['error'] = '';
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'mp3';
		$config['max_size']	= '1000000000';
		

		$this->load->library('upload', $config);

		$dataarr = array();
		if ( ! $this->upload->do_upload('file'))
		{
			$view_passed['error'] = $this->upload->display_errors();
			$view_passed['content_path'] = 'jeff/upload_view';
			$this->load->view('template/general_template_view',$view_passed);
		}
		else
		{
			$dataarr =  $this->upload->data();

			
			$fileinput = $dataarr['full_path'];
			$fileoutput = $dataarr['file_path'] .$dataarr['raw_name'];
			$command = "/home2/westphal/sox-14.4.1/src/sox $fileinput $fileoutput".".wav";
//			echo $command."<br>";
			`$command`;
			$command = "/home2/westphal/sox-14.4.1/src/sox $fileinput $fileoutput".".ogg";
//			echo $command."<br>";
			`$command`;
			$command = "/home2/westphal/sox-14.4.1/src/sox $fileinput $fileoutput".".vorbis";
//			echo $command."<br>";
			`$command`;
// 			`"/home2/westphal/sox-14.4.1/src/sox $fileinput $fileoutput".".wav"`;
// 			`"/home2/westphal/sox-14.4.1/src/sox $fileinput $fileoutput".".ogg"`;
// 			`"/home2/westphal/sox-14.4.1/src/sox $fileinput $fileoutput".".vorbis"`;
			
			$view_passed['filename'] = $dataarr['raw_name'];
			$view_passed['formats'] = array("mp3" , "wav", "ogg", "vorbis");
			$view_passed['content_path'] = 'jeff/upload_view';
			$this->load->view('template/general_template_view',$view_passed);
		}
	}
	
	public function massdatauploader(){
// 		echo "CURRENTLY WORKING ON THIS - NOT AVAIALBLE RIGHT NOW";
// 		exit;
		
		$this->load->library('phpass');
		$hashed = $this->phpass->hash("test");
		
		$artistnum = 200;
		$usernum = 2000;
		$maxartistsperband = 8;
		$bandnum = 300;
		$albumnum = 1000;
		$trackmax = 20;
		$featuredalbums = 120;
		$featuredbands = 100;
		$userfollowmax = 20;
		$artistfollowmax = 5;
		$bandfollowmax = 10;
		$venuefollowmax = 5;
		$venuenum = 100;
		$featuredvenues = 30;
		$trackbuymax = 10;
		$albumbuymax = 10;
		
		/*
		 * Clear the following tables:
		 * all people with email jeff@rezoundmusic.com from the user_accts
		 * bands
		 * band_members
		 * albums
		 * tracks
		 * featured_albums
		 * featured_bands
		 * venues
		 * featured_venues
		 * bands_following
		 * users_following
		 * venues_following
		 * user_owned_tracks
		 * user_owned_albums
		 */
		
		$this->db->where('email', "jeff@rezoundmusic.com");
		$this->db->delete('user_accts');
		
		$this->db->empty_table('bands');
		$this->db->empty_table('band_members');
		$this->db->empty_table('albums');
		$this->db->empty_table('tracks');
		$this->db->empty_table('featured_albums');
		$this->db->empty_table('featured_bands');
		$this->db->empty_table('featured_venues');
		$this->db->empty_table('bands_following');
		$this->db->empty_table('users_following');
		$this->db->empty_table('venues_following');
		$this->db->empty_table('venues');
		$this->db->empty_table('user_owned_tracks');
		$this->db->empty_table('user_owned_albums');
		
		
		
		//Make the artists
		error_log("Making $artistnum Artists");
		
		for($i = 0;$i<$artistnum;$i++){
			$name = "artist_$i";
			$data = array(
					'email' => "jeff@rezoundmusic.com",
					'username' => $name,
					'password' => $hashed,
					'valid' => 1,
					'joined_date' => date('Y-m-d H:i:s'),
					'is_artist' => 1
			);
			$this->db->insert('user_accts',$data);
		}
		
		//Make the bands
		
		error_log("Making $bandnum Bands");
		for($i = 0;$i<$bandnum;$i++){
			$name = "band_$i";
			$data = array(
					'band_name' => $name
			);
			$this->db->insert('bands',$data);
		}
		
		//assign members to the bands
		error_log("Assigning band members");
		for($i = 0;$i<$bandnum;$i++){
			
			//choose a random number of band members for a given band
			$artistcount = rand(1,$maxartistsperband);
			$isfirst = true;
			//go through each number of artists for each band
			$alreadyused = array();
			for($j = 0;$j<$artistcount;$j++){
				
				//pull a random artist
				
				$artistindex = rand(1,$artistnum)-1; 
				$artistname = "artist_$artistindex";
				while(in_array($artistname,$alreadyused)){
					$artistindex = rand(1,$artistnum)-1;
					$artistname = "artist_$artistindex";
				}
				$alreadyused[] = $artistname;
				
				foreach ($this->db->get_where('user_accts',array('username' => $artistname))->result() as $row)
					$userid = $row->user_id;
				
				$admin = 0;
				$active = rand(0,1);
				
				if($isfirst){
					$isfirst==false;
					$admin = 1;
					$active = 1;
				}
				
				$bandname = "band_$i";
				foreach ($this->db->get_where('bands',array('band_name' => $bandname))->result() as $row)
					$bandid = $row->band_id;
				
				$data = array(
						'user_id' => $userid,
						'band_id' => $bandid,
						'title' => "Position Of $userid",
						'active' => $active,
						'admin' => $admin,
				);
				$this->db->insert('band_members',$data);

			}

		}
		
		//Make the albums
		error_log("Making $albumnum Albums");
		for($i = 0;$i<$albumnum;$i++){
			//Get a random band to assign the album to
			$bandindex = rand(1,$bandnum)-1;
			$bandname = "band_$bandindex";
			foreach ($this->db->get_where('bands',array('band_name' => $bandname))->result() as $row)
				$bandid = $row->band_id;
			
			$price = rand(0,2000)*0.01;
			$minprice = rand(0,1000)*0.01;
			
			if($minprice > $price)
				$minprice = 0;
			
			$days = rand(-50,20);
			$release = strtotime("$days days");
			
			
			$data = array(
					'band_id' => $bandid,
					'album_name' => "album_$i",
					'price' => $price,
					'min_price' => $minprice,
					'release_date' => date('Y-m-d H:i:s',$release),
//					'image' => "",
					'description' => "Test description of Band $bandid for album $i"
			);
			$this->db->insert('albums',$data);
		}
		
		//Put tracks in for the albums
		error_log("Putting tracks in the albums");
		for($i=0;$i<$albumnum;$i++){
			
			$albumname = "album_$i";
			$tracknum = rand(1,$trackmax);
			
			foreach ($this->db->get_where('albums',array('album_name' => $albumname))->result() as $row){
				$albumid = $row->album_id;
				$bandid = $row->band_id;
				$release = $row->release_date;
			}
			
			$price = rand(0,200)*0.01;
			$minprice = rand(0,100)*0.01;
				
			if($minprice > $price)
				$minprice = 0;
			
			for($j=0;$j<$tracknum;$j++){
				$data = array(
						'band_id' => $bandid,
						'album_id' => $albumid,
						'track_name' => "track_$i",
						'price' => $price,
						'min_price' => $minprice,
						'length' => "",
						'release_date' => $release,
						'description' => "A song which is number $j on the album $albumid from band $bandid",
						'lyrics' => "SING ALONG WITH TRACK $i"
				);
				$this->db->insert('tracks',$data);
			}
		}
		
		//Track number for later
		
		$this->db->select_min('track_id');
		foreach($this->db->get('tracks')->result() as $row)
			$track_id_min = $row->track_id;
		
		$this->db->select_max('track_id');
		foreach($this->db->get('tracks')->result() as $row)
			$track_id_max = $row->track_id;		
		
		//Put in the featured albums
		error_log("Putting in $featuredalbums featured albums");
		
		$alreadyused = array();
		for($i=0;$i<$featuredalbums;$i++){
			
			$days = rand(-14,14);
			$start = strtotime("$days days");
			$days = 7 + $days;
			$end = strtotime("$days days");
			
			$albumindex = rand(1,$albumnum)-1;
			$albumname = "album_$albumindex";
				
			while(in_array($albumname,$alreadyused)){
				$albumindex = rand(1,$albumnum)-1;
				$albumname = "album_$albumindex";				
			}
			$alreadyused[] = $albumname;
			
			foreach ($this->db->get_where('albums',array('album_name' => $albumname))->result() as $row)
				$albumid = $row->album_id;
				
			$data = array(
					'album_id' => $albumid,
					'start_date' => date('Y-m-d H:i:s',$start),
					'end_date' => date('Y-m-d H:i:s',$end)
			);
			$this->db->insert('featured_albums',$data);
		}		
		
		//Put in the featured bands
		
		$alreadyused = array();
		error_log("Putting in $featuredbands featured bands");
		
		for($i=0;$i<$featuredbands;$i++){
				
			$days = rand(-14,14);
			$start = strtotime("$days days");
			$days = 7 + $days;
			$end = strtotime("$days days");
				
			$bandindex = rand(1,$bandnum)-1;
			$bandname = "band_$bandindex";
			while(in_array($bandname,$alreadyused)){
				$bandindex = rand(1,$bandnum)-1;
				$bandname = "band_$bandindex";
			}
			$alreadyused[] = $bandname;
				
			foreach ($this->db->get_where('bands',array('band_name' => $bandname))->result() as $row)
				$bandid = $row->band_id;
		
			$data = array(
					'band_id' => $bandid,
					'start_date' => date('Y-m-d H:i:s',$start),
					'end_date' => date('Y-m-d H:i:s',$end)
			);
			$this->db->insert('featured_bands',$data);
		}
		
		//Lets put in some fake users
		error_log("Putting in $usernum fake users");
		for($i = 0;$i<$usernum;$i++){
			$name = "user_$i";
			$data = array(
					'email' => "jeff@rezoundmusic.com",
					'username' => $name,
					'password' => $hashed,
					'valid' => 1,
					'joined_date' => date('Y-m-d H:i:s'),
					'is_artist' => 0
			);
			$this->db->insert('user_accts',$data);
		}	
		
		//Venues
		error_log("Putting in $venuenum venues");
		for($i = 0;$i<$venuenum;$i++){
			$name = "venue_$i";
			$data = array(
					'venue_name' => "$name",
					'venue_contact_phone' => "555-555-5555",
					'joined_date' => date('Y-m-d H:i:s'),
					'venue_contact_fname' => 'Bob',
					'venue_contact_lname' => 'Dole',
					'address_1' => "1000 A STREET",
					'city' => 'New York City',
					'zip_code' => '10001',
					'state' => 'NY',
					'venue_contact_email' => 'jeff@rezoundmusic.com',
					'country' => 'USA',
					'is_active' => 1
			);
			$this->db->insert('venues',$data);
		}
		
		//Featured venues
		
		$alreadyused = array();
		error_log("Putting in $featuredvenues featured venues");
		
		for($i=0;$i<$featuredvenues;$i++){
				
			$days = rand(-14,14);
			$start = strtotime("$days days");
			$days = 7 + $days;
			$end = strtotime("$days days");
				
			$venueindex = rand(1,$venuenum)-1;
			$venuename = "venue_$venueindex";
		
			while(in_array($venuename,$alreadyused)){
				$venueindex = rand(1,$venuenum)-1;
				$venuename = "venue_$venueindex";
			}
			$alreadyused[] = $venuename;
				
			foreach ($this->db->get_where('venues',array('venue_name' => $venuename))->result() as $row)
			$venueid = $row->venue_id;
		
			$data = array(
					'venue_id' => $venueid,
					'start_date' => date('Y-m-d H:i:s',$start),
					'end_date' => date('Y-m-d H:i:s',$end)
			);
					$this->db->insert('featured_venues',$data);
		}
		
		//Put in a bunch of users randomly following things
		error_log("Having the users follow things");
		for($i = 0;$i<$usernum;$i++){
			$name = "user_$i";
			
			foreach ($this->db->get_where('user_accts',array('username' => $name))->result() as $row)
				$userid = $row->user_id;
			
			$userfollows = rand(0,$userfollowmax);
			$artistfollows = rand(0,$artistfollowmax);
			$bandfollows = rand(0,$bandfollowmax);
			$venuefollows = rand(0,$venuefollowmax);
			
			$alreadyused = array();
			
			//Have users follow other users
			for($j = 0;$j<$userfollows;$j++){
				
				$followindex = rand(1,$usernum)-1;
				$followname = "user_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$usernum);
					$followname = "user_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('user_accts',array('username' => $followname))->result() as $row)
					$followid = $row->user_id;				
				$data = array(
						'user_id' => $userid,
						'followed_user_id' => $followid,
				);
				$this->db->insert('users_following',$data);
				
			}

			//have users follow artists
			$alreadyused = array();
				
			for($j = 0;$j<$artistfollows;$j++){
			
				$followindex = rand(1,$artistnum)-1;
				$followname = "artist_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$artistnum);
					$followname = "artist_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('user_accts',array('username' => $followname))->result() as $row)
					$followid = $row->user_id;
				$data = array(
						'user_id' => $userid,
						'followed_user_id' => $followid,
				);
				$this->db->insert('users_following',$data);
			
			}
			
			//have users follow a band
			$alreadyused = array();
			
			for($j = 0;$j<$bandfollows;$j++){
					
				$followindex = rand(1,$bandnum)-1;
				$followname = "band_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$bandnum);
					$followname = "band_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('bands',array('band_name' => $followname))->result() as $row)
					$followid = $row->band_id;
				$data = array(
						'user_id' => $userid,
						'followed_band_id' => $followid,
				);
				$this->db->insert('users_following',$data);
					
			}			
			
			//have users follow a venue
			
			$alreadyused = array();
				
			for($j = 0;$j<$venuefollows;$j++){
					
				$followindex = rand(1,$venuenum)-1;
				$followname = "venue_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$venuenum);
					$followname = "venue_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('venues',array('venue_name' => $followname))->result() as $row)
					$followid = $row->venue_id;
				$data = array(
						'user_id' => $userid,
						'followed_venue_id' => $followid,
				);
				$this->db->insert('users_following',$data);
					
			}
		}		
		
		//Give the artists some stuff to follow too, they are really just users anyway
		error_log("having the artist follow things");
		for($i = 0;$i<$artistnum;$i++){
			$name = "artist_$i";
				
			foreach ($this->db->get_where('user_accts',array('username' => $name))->result() as $row)
				$userid = $row->user_id;
				
			$userfollows = rand(0,$userfollowmax);
			$artistfollows = rand(0,$artistfollowmax);
			$bandfollows = rand(0,$bandfollowmax);
			$venuefollows = rand(0,$venuefollowmax);
				
			$alreadyused = array();
				
			//Have users follow other users
			for($j = 0;$j<$userfollows;$j++){
			
				$followindex = rand(1,$usernum)-1;
				$followname = "user_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$usernum);
					$followname = "user_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('user_accts',array('username' => $followname))->result() as $row)
					$followid = $row->user_id;
				$data = array(
						'user_id' => $userid,
						'followed_user_id' => $followid,
				);
				$this->db->insert('users_following',$data);
			
			}
			
			//have users follow artists
			$alreadyused = array();
			
			for($j = 0;$j<$artistfollows;$j++){
					
				$followindex = rand(1,$artistnum)-1;
				$followname = "artist_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$artistnum);
					$followname = "artist_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('user_accts',array('username' => $followname))->result() as $row)
					$followid = $row->user_id;
				$data = array(
						'user_id' => $userid,
						'followed_user_id' => $followid,
				);
				$this->db->insert('users_following',$data);
					
			}
				
			//have users follow a band
			$alreadyused = array();
				
			for($j = 0;$j<$bandfollows;$j++){
					
				$followindex = rand(1,$bandnum)-1;
				$followname = "band_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$bandnum);
					$followname = "band_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('bands',array('band_name' => $followname))->result() as $row)
					$followid = $row->band_id;
				$data = array(
						'user_id' => $userid,
						'followed_band_id' => $followid,
				);
				$this->db->insert('users_following',$data);
					
			}
				
			//have users follow a venue
				
			$alreadyused = array();
			
			for($j = 0;$j<$venuefollows;$j++){
					
				$followindex = rand(1,$venuenum)-1;
				$followname = "venue_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$venuenum);
					$followname = "venue_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('venues',array('venue_name' => $followname))->result() as $row)
					$followid = $row->venue_id;
				$data = array(
						'user_id' => $userid,
						'followed_venue_id' => $followid,
				);
				$this->db->insert('users_following',$data);
					
			}
		}		
		
		//Put in a bunch of bands randomly following things
		error_log("having the bands follow things");
		for($i = 0;$i<$bandnum;$i++){
			$name = "band_$i";
		
			foreach ($this->db->get_where('bands',array('band_name' => $name))->result() as $row)
				$bandid = $row->band_id;
		
			$userfollows = rand(0,$userfollowmax);
			$artistfollows = rand(0,$artistfollowmax);
			$bandfollows = rand(0,$bandfollowmax);
			$venuefollows = rand(0,$venuefollowmax);
		
			$alreadyused = array();
		
			//Have users follow other users
			for($j = 0;$j<$userfollows;$j++){
					
				$followindex = rand(1,$usernum)-1;
				$followname = "user_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$usernum);
					$followname = "user_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('user_accts',array('username' => $followname))->result() as $row)
					$followid = $row->user_id;
				$data = array(
						'band_id' => $bandid,
						'followed_user_id' => $followid,
				);
				$this->db->insert('bands_following',$data);
					
			}
				
			//have users follow artists
			$alreadyused = array();
				
			for($j = 0;$j<$artistfollows;$j++){
					
				$followindex = rand(1,$artistnum)-1;
				$followname = "artist_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$artistnum);
					$followname = "artist_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('user_accts',array('username' => $followname))->result() as $row)
					$followid = $row->user_id;
				$data = array(
						'band_id' => $bandid,
						'followed_user_id' => $followid,
				);
				$this->db->insert('bands_following',$data);
					
			}
		
			//have users follow a band
			$alreadyused = array();
		
			for($j = 0;$j<$bandfollows;$j++){
					
				$followindex = rand(1,$bandnum)-1;
				$followname = "band_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$bandnum);
					$followname = "band_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('bands',array('band_name' => $followname))->result() as $row)
					$followid = $row->band_id;
				$data = array(
						'band_id' => $bandid,
						'followed_band_id' => $followid,
				);
				$this->db->insert('bands_following',$data);
					
			}
		
			//have users follow a venue
		
			$alreadyused = array();
				
			for($j = 0;$j<$venuefollows;$j++){
					
				$followindex = rand(1,$venuenum)-1;
				$followname = "venue_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$venuenum);
					$followname = "venue_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('venues',array('venue_name' => $followname))->result() as $row)
					$followid = $row->venue_id;
				$data = array(
						'band_id' => $bandid,
						'followed_venue_id' => $followid,
				);
				$this->db->insert('bands_following',$data);
					
			}
		}
		//Put in a bunch of venues following things
		error_log("Having the venues follow things");
		for($i = 0;$i<$venuenum;$i++){
			$name = "venue_$i";
		
			foreach ($this->db->get_where('venues',array('venue_name' => $name))->result() as $row)
				$venueid = $row->venue_id;
		
			$userfollows = rand(0,$userfollowmax);
			$artistfollows = rand(0,$artistfollowmax);
			$bandfollows = rand(0,$bandfollowmax);
			$venuefollows = rand(0,$venuefollowmax);
		
			$alreadyused = array();
		
			//Have users follow other users
			for($j = 0;$j<$userfollows;$j++){
					
				$followindex = rand(1,$usernum)-1;
				$followname = "user_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$usernum);
					$followname = "user_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('user_accts',array('username' => $followname))->result() as $row)
					$followid = $row->user_id;
				$data = array(
						'venue_id' => $venueid,
						'followed_user_id' => $followid,
				);
				$this->db->insert('venues_following',$data);
					
			}
		
			//have users follow artists
			$alreadyused = array();
		
			for($j = 0;$j<$artistfollows;$j++){
					
				$followindex = rand(1,$artistnum)-1;
				$followname = "artist_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$artistnum);
					$followname = "artist_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('user_accts',array('username' => $followname))->result() as $row)
					$followid = $row->user_id;
				$data = array(
						'venue_id' => $venueid,
						'followed_user_id' => $followid,
				);
				$this->db->insert('venues_following',$data);
					
			}
		
			//have users follow a band
			$alreadyused = array();
		
			for($j = 0;$j<$bandfollows;$j++){
					
				$followindex = rand(1,$bandnum)-1;
				$followname = "band_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$bandnum);
					$followname = "band_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('bands',array('band_name' => $followname))->result() as $row)
					$followid = $row->band_id;
				$data = array(
						'venue_id' => $venueid,
						'followed_band_id' => $followid,
				);
				$this->db->insert('venues_following',$data);
					
			}
		
			//have users follow a venue
		
			$alreadyused = array();
		
			for($j = 0;$j<$venuefollows;$j++){
					
				$followindex = rand(1,$venuenum)-1;
				$followname = "venue_$followindex";
				while(in_array($followname,$alreadyused)){
					$followindex = rand(1,$venuenum);
					$followname = "venue_$followindex";
				}
				$alreadyused[] = $followname;
				foreach ($this->db->get_where('venues',array('venue_name' => $followname))->result() as $row)
					$followid = $row->venue_id;
				$data = array(
						'venue_id' => $venueid,
						'followed_venue_id' => $followid,
				);
				$this->db->insert('venues_following',$data);
					
			}
		}
		//Put in a bunch of purchases by users
		error_log("Putting in purchases by users");
		for($i = 0;$i<$usernum;$i++){
			$name = "user_$i";
// 			error_log("Name $name</br>");
				
			foreach ($this->db->get_where('user_accts',array('username' => $name))->result() as $row)
				$userid = $row->user_id;
				
// 			error_log("User id $userid</br>");
			$albumbuys = rand(0,$albumbuymax);
			$trackbuys = rand(0,$trackbuymax);
// 			error_log("Albums to buy $albumbuys tracks to buy $trackbuys");
			$albumsused = array();
			
			for($j = 0;$j<$albumbuys;$j++){
// 				error_log("In albumbuys ($albumbuys) value $j");
				
				$albumindex = rand(1,$albumnum)-1;
				$albumname = "album_$albumindex";
				while(in_array($albumname,$albumsused)){
					$albumindex = rand(1,$albumnum)-1;
					$albumname = "album_$albumindex";
				}
				$albumsused[] = $albumname;
				
// 				error_log("Album name $albumname");
				
				foreach ($this->db->get_where('albums',array('album_name' => $albumname))->result() as $row)
					$albumid = $row->album_id;
				
// 				error_log("Album id $albumid");
				
				$data = array(
						'user_id' => $userid,
						'album_id' => $albumid,
						'date_purchased' => date('Y-m-d H:i:s')
				);
				$this->db->insert('user_owned_albums',$data);
					
			}
			
			$tracksused = array();
			
			foreach($albumsused as $album){
				foreach ($this->db->get_where('albums',array('album_name' => $albumname))->result() as $row)
					$albumid = $row->album_id;
				
				foreach ($this->db->get_where('tracks',array('album_id' => $albumid))->result() as $row)
					$tracksused[] = $row->track_id;
			}
			
// 			var_dump($tracksused);
			
			for($j = 0;$j<$trackbuys;$j++){
				$trackid = rand($track_id_min,$track_id_max)-1;
				while(in_array($trackid,$tracksused)){
					$trackid = rand($track_id_min,$track_id_max)-1;
				}
				$tracksused[] = $trackid;
				
				$data = array(
						'user_id' => $userid,
						'track_id' => $trackid,
						'date_purchased' => date('Y-m-d H:i:s')
				);
				$this->db->insert('user_owned_tracks',$data);
					
			}
			
// 			error_log("Done inserting now to loop");
		}
		
		
		//Have the artists purchase stuff too
		error_log("Putting in purchases by artists");
		
		for($i = 0;$i<$artistnum;$i++){
			$name = "artist_$i";
		
			foreach ($this->db->get_where('user_accts',array('username' => $name))->result() as $row)
				$userid = $row->user_id;
		
			$albumbuys = rand(0,$albumbuymax);
			$trackbuys = rand(0,$trackbuymax);
				
			$albumsused = array();
				
			for($j = 0;$j<$albumbuys;$j++){
					
				$albumindex = rand(1,$albumnum)-1;
				$albumname = "album_$albumindex";
				while(in_array($albumname,$albumsused)){
					$albumindex = rand(1,$albumnum)-1;
					$albumname = "album_$albumindex";
				}
				$albumsused[] = $albumname;
		
				foreach ($this->db->get_where('albums',array('album_name' => $albumname))->result() as $row)
					$albumid = $row->album_id;
		
				$data = array(
						'user_id' => $userid,
						'album_id' => $albumid,
						'date_purchased' => date('Y-m-d H:i:s')
				);
				$this->db->insert('user_owned_albums',$data);
					
			}
				
			$tracksused = array();
				
			foreach($albumsused as $album){
				foreach ($this->db->get_where('albums',array('album_name' => $albumname))->result() as $row)
					$albumid = $row->album_id;
		
				foreach ($this->db->get_where('tracks',array('album_id' => $albumid))->result() as $row)
					$tracksused[] = $row->track_id;
			}
		
			for($j = 0;$j<$trackbuys;$j++){
					
				$trackid = rand($track_id_min,$track_id_max)-1;
				while(in_array($trackid,$tracksused)){
					$trackid = rand($track_id_min,$track_id_max)-1;
				}
				$tracksused[] = $trackid;
					
				$data = array(
						'user_id' => $userid,
						'track_id' => $trackid,
						'date_purchased' => date('Y-m-d H:i:s')
				);
				$this->db->insert('user_owned_tracks',$data);
					
			}
				
		}
	}
}