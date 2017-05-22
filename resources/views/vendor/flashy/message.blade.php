<style>
.flashy {
    font-family: Arial, sans-serif;
    padding: 11px 30px;
    border-radius: 4px;
    font-weight: 400;
    position: fixed;
    top: 10px;
    left: 200px;
    z-index: 101011;
    font-size: 12px;
    color: #333;
    width: 100%;
}

.flashy--success i {
    color: #29c75f;
}

.flashy--warning {
    color: #8a6d3b;
}

.flashy--muted {
    background: #eee;
    color: #3a3a3a;
    border: 1px solid #e2e2e2;
}

.flashy--muted-dark {
    background: #133259;
    color: #e2e1e7;
}

.flashy--info a,
.flashy--primary-dark a {
    color: #fff;
}

.flashy--error {
    background: #d14130;
    color: #fff;
}

.flashy--primary {
    background: #573e81;
}

.flashy--primary-dark {
    background: linear-gradient(to right, #133259 30%, #0d233e);
}

.flashy--info {
    background: #00baf3;
}

.flashy > ul {
    padding-left: 15px;
}

.flashy > p:only-of-type {
    margin-bottom: 0;
}

.flashy .flashy__body {
    color: inherit;
}

@media only screen and (max-width:1050px) {
    .flashy {
        text-align: center;
        right: 0;
        left: 50%;
        width: 300px;
        margin-left: -150px;
    }
}

.flash--message-notice {
    width: auto;
    vertical-align: middle;
    position: absolute;
    left: 50%;
}
.flash--message-notice-content {
    position: relative;
    right: 50%;
    padding: 8px 30px;
    border-radius: 4px;
    box-shadow: 0 1px 6px rgba(0,0,0,.2);
    background: #fff;
    display: block;
}
.flash--icon {
    margin-right: 8px;
    font-size: 14px;
    top: 1px;
    position: relative;
}
</style>

<script>
    function flashy(message, link) {
        var template = $($("#flashy-template").html());
        $(".flashy").remove();
        template.find(".flash--message-notice-content span").html(message);
        var tip = template.find(".flashy__body").attr("href", link || "#").end().appendTo("body");
        tip.hide().fadeIn(2500).delay(3000).animate({marginTop: "-100%"}, '300', "swing", function() {
            $(this).remove();
        });
    }
</script>

@if(Session::has('flashy_notification.message'))

<script id="flashy-template" type="text/template">
    <div class="flashy">
        <div class="flash--message-notice">
            <a href="#" class="flashy__body flashy--{{ Session::get('flashy_notification.type') }}" target="_blank">
                <div class="flash--message-notice-content">
                    <i class="fa fa-check-circle flash--icon"></i>
                    <span></span>
                </div>
            </a>
        </div>
    </div>
</script>

<script>
    flashy("{{ Session::get('flashy_notification.message') }}", "{{ Session::get('flashy_notification.link') }}");
</script>
@endif