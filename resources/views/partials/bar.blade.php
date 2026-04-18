<style>
#contensio-progress{position:fixed;top:0;left:0;width:0%;height:3px;background:#e05b2b;z-index:9999;transition:width .1s linear;pointer-events:none;}
</style>
<div id="contensio-progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"></div>
<script>
(function(){
    var bar = document.getElementById('contensio-progress');
    function update(){
        var body = document.querySelector('.contensio-post-body');
        if(!body||!bar) return;
        var rect = body.getBoundingClientRect();
        var total = body.offsetHeight - window.innerHeight;
        if(total <= 0){ bar.style.width='100%'; return; }
        var pct = Math.min(100, Math.max(0, (-rect.top / total) * 100));
        bar.style.width = pct + '%';
        bar.setAttribute('aria-valuenow', Math.round(pct));
    }
    document.addEventListener('scroll', update, {passive:true});
    update();
}());
</script>
