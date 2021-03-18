<section>
    <table width=100px height=100px>
        <tr>
            <td>
                <?php $this->getTabHtml();?>
            </td>
        </tr>
        <tr>
            <td>
                <div class="container">
                    <h1 style="color:gray"><?php $this->getTitle(); ?></h1>
                        <?php echo $this->getTabContent(); ?>
                </div>
            </td>
        </tr>
    </table> 
</section>
