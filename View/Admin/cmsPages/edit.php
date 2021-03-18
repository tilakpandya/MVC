<?php
$cmsPages=$this->getCmsPages();
?>
<section>
    <div class="container">
        <h1 style="color:gray">CMS PagesForm</h1>

        <form action="<?php echo $this->getUrl()->getUrl('save')?>" method="POST">
            <div class="form-group contentHtml">
                <table class="table">
                    <tr>
                        <td>
                            <input type="text" name="cmsPages[title]" id="title" value="<?php echo $cmsPages->title?>"
                                placeholder="Title" class="form-control">
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <input type=" text" name="cmsPages[identifier]" id="identifier" value="<?php echo $cmsPages->identifier?>"
                                placeholder="Identifier" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="cmsPages[status]" class="form-control">
                                <option value=" ">select Status</option>
                                <?php
                                foreach ($cmsPages->getStatusOptions() as $key => $value) { ?>
                                <option value="<?php echo $value?>"
                                    <?php if ($cmsPages->status == $value) {echo "Selected";}?>>
                                    <?php echo $value?>
                                </option>
                                <?php }?>
                            </select>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <textarea id="summernote" name="cmsPages[content]" class="form-control" rows=15><?php echo $cmsPages->content?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="submit" name="submit" value="SAVE" class="btn btn-success btn-lg">
                        <a onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid','CMSPages',null,null)?>').resetParams().load()">
                            <button type="button" class="btn btn-danger btn-lg">Cancel</button></a>
                        </td>
                        <td></td>
                    </tr>



                </table>
            </div>
        </form>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>