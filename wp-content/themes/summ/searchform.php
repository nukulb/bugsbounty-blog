<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
<div>
	<input type="text"   value="Search" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" name="s" id="s" size="15" />
	<input type="submit"  id="searchsubmit" />
</div>
</form>