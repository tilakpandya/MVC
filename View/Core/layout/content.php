<div id="contentHtml">
<?php
$children=$this->getChildren();

foreach ($children as $child) {
   
    echo $child->toHtml();
}   
?>

</div>
<script type="text/javascript">
    
    /*  obejct = new Base();

        $(document).ready(function(){
            obejct.setParams({
            name: "Tilak",
            email: "abc",
        });
    
        obejct.setUrl("http://localhost:8080/22-02-2021/index.php?c=product&a=gridHtml");
        obejct.load();
    
    }); 
 
console.log(obejct); */
</script>
 