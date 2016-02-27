	<body>
		<div align='center'> Hello word</div>
		<?


		//<img src='' alt="..." class="img-rounded">
		//echo "<img src='tools/img/asuna.jpg' class='img-rounded'>";
		//<img src="..." alt="..." class="img-thumbnail">



			$this->load->helper('html');

			echo "<a href=index.php/welcome/test_db>Show Room</a>";
			echo br(1);
			echo "<a href=index.php/welcome/ret_day>Show day</a>";
			echo br(1);
			echo "<a href=index.php/welcome/ret_group>Show Group</a>";
			echo br(1);
			echo "<a href=index.php/welcome/ret_teacher>Show Teacher</a>";


			echo br(3);
			echo "<div align='center'>".$this->input->ip_address()."</div>";

			echo br(3);

			echo count($select_day);

			echo br(3);


			foreach ($select_day as $days) {
				print_r($days);
				echo br(1);
			}
			
			//echo $ip;
		?>
	</body>