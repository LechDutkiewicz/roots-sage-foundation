<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly

// Rotate 13 encrypting emails

class Rotate13_Email {

	public function __construct($email = null, $owner = null) {

		if ( function_exists( "register_field_group" ) ) {

			$this->email = !$email ? get_field('company_email', 'option') : $email;

		} else {

			$this->email = get_bloginfo('admin_email');

		}
		$this->owner = !$owner ? get_bloginfo('name') : $owner;
	}

	public function encrypt_email( $class = null, $anchor = null, $subject = null ) { ?>

	<script type="text/javascript">
		document.write("<?php $this->coded_email( $class, $anchor, $subject ); ?>".replace(/[a-zA-Z]/g, function(c){
			return String.fromCharCode((c<="Z"?90:122)>=(c=c.charCodeAt(0)+13)?c:c-26);
		})
		);
	</script>

	<?php }

	private function coded_email( $class = null, $anchor = null, $subject = null ) {

		echo $this->get_coded_email( $class, $anchor, $subject );
	}

	private function get_coded_email( $class = null, $anchor = null, $subject = null ) {

		$button = "<a href='mailto:?";
		$button .= $subject ? "subject=$subject&" : "";
		$button .= "to=$this->email'";
		$button .= $class ? " class='$class'" : "";
		$button .= " target='_blank'";
		$button .= " title='" . __('Mail to', 'sage') . " " . $this->owner . "'>";
		$button .= $anchor ? $anchor : $this->email;
		$button .= "</a>";
		return str_rot13($button);
	}

}

?>
