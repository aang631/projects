<?php 
$types=["All","Chumash", "Nach", "Halacha", "Mishnah", "Gemara", "Tefilla", "Mussar", "Other"];
?>
<div class="col-xs-2 filter">
    <form>
        <div class="well">
          <h4>Please enter some information about what you are looking for to narrow the search of our expansive catalog</h4>
            <input type="hidden" name="action" value="<?=$action?>" />
			<div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php if(!empty($_GET['name'])){
					echo $_GET['name'];
				} ?>"/>
            </div>
            <div class="form-group">
                <label for="min" class="control-label">Minimum Price</label>
                <input type="number" name="min" id="min" class="form-control" value="<?php if(!empty($_GET['min'])){
					echo $_GET['min'];
				} ?>"/>
            </div>
			<div class="form-group">
                <label for="max" class="control-label">Maximum Price</label>
                <input type="number" name="max" id="max" class="form-control" value="<?php if(!empty($_GET['max'])){
					echo $_GET['max'];
				} ?>"/>
            </div>
			<div class="form-group">
                <label for="type" class="control-label">Sefer Type</label>
				<select name="type">
				  <?php foreach ($types as $typeOption): ?>
					<option value="<?php echo $typeOption ?>" <?php if($typeOption===$type)echo "selected"; ?>><?=$typeOption?></option>
				  <?php endforeach; ?>
				</select>
            </div>
			<div class="form-group">
                <label for="inStock" class="control-label">Check box to only see the seforim in stock</label>
                <input type="checkbox" id="inStock" name="inStock" value="Y" <?php if(!empty($_GET["inStock"])){
				echo "checked";}?>/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Apply"/>
            </div>
        </div>
    </form>
</div>

