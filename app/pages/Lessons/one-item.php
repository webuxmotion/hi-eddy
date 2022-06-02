<div class="p-one-item js-one-item-page">
    <?php if (isUser()): ?>
        <?=$item['has_pin'] ? 'PINNED' : ''?>
        <a href="/lessons/toggle-pin/<?=$item['id']?>">
            Toggle Pin
        </a>

        <!-- <?=$item['has_done'] ? 'DONE' : ''?>
        <a href="/lessons/toggle-done/<?=$item['id']?>">
            Toggle Done
        </a> -->
    <?php endif; ?>
    <h1><?=$item['title']?></h1>
    <?=$content?>
</div>

<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
        this.page.url = "<?=baseUrl()?>lessons/<?=$item['slug']?>";  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = "<?=$item['slug']?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://hi-eddy.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>


<?=$this->component('go-top-button')?>
