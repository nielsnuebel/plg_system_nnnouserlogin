<div id="nnnouserlogin" >
	<div id="nnnouserlogin_wrapper" class="close">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php if($this->params->get('intro-text')):?>
					<p class="intro"><?php echo JText::_($this->params->get('intro-text')); ?></p>
					<?php endif;?>
					<form action="<?php echo JRoute::_(JUri::getInstance()->toString(), true); ?>" class="form-inline" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="username" id="username" placeholder="<?php echo JText::_($this->params->get('placeholder','PLG_SYSTEM_NNNOUSERLOGIN_PLACEHOLDER'))?>">
						</div>
						<button type="submit" class="btn btn-success"><?php echo JText::_($this->params->get('submit','PLG_SYSTEM_NNNOUSERLOGIN_SUBMIT'))?></button>
					</form>
					<?php if($this->params->get('outro-text')):?>
					<p class="outro"><?php echo JText::_($this->params->get('outro-text')); ?></p>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<div id="nnnouserlogin_button" class="open">
		<i class="down fa fa-chevron-down"></i>
		<i class="up fa fa-chevron-up"></i>
	</div>
</div>
