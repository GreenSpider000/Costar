<div id="super-search" class="s-search mx-auto">
    <div id="search-type-list" class="hide-type-list">
        <div class="s-type text-center">
            <div class="s-type-list big">
                <div class="anchor" style="position: absolute; left: 50%; opacity: 0"></div>
                <label for="type-baidu" data-id="group-a"><span>常用</span></label>
                <label for="type-baidu1" data-id="group-b"><span>搜索</span></label>
                <label for="type-whois" data-id="group-c"><span>工具</span></label>
                <label for="type-zhihu" data-id="group-d"><span>社区</span></label>
                <label for="type-taobao1" data-id="group-e"><span>生活</span></label>
                <label for="type-zhaopin" data-id="group-f"><span>求职</span></label>
            </div>
        </div>
    </div>
    <form class="search-form" action="https://www.baidu.com?s=" method="get" target="_blank">
        <input id="search-text" class="form-control search-key" type="text" placeholder="输入关键字搜索" autocomplete="off" />
        <button class="submit" type="submit"><i class="fa fa-search"></i></button>
    </form>
    <div id="search-provider-list" class="hide-type-list">
        <div class="search-group group-a">
            <ul class="search-provider">
                <li>
                    <input type="radio" name="provider" hidden checked="checked" id="type-baidu" value="https://www.baidu.com/s?wd=" data-placeholder="百度一下，你就知道" />
                    <label for="type-baidu"><span class="text-muted">百度</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-bing" value="https://cn.bing.com/search?q=" data-placeholder="微软 Bing 搜索" />
                    <label for="type-bing"><span class="text-muted">必应</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-google" value="https://www.google.com/search?q=" data-placeholder="谷歌搜索" />
                    <label for="type-google"><span class="text-muted">谷歌</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-anaconda" value="https://anaconda.org/search?q=" data-placeholder="Anaconda 软件搜索" />
                    <label for="type-anaconda"><span class="text-muted">软件</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-pubmed" value="https://pubmed.ncbi.nlm.nih.gov/?term=" data-placeholder="PubMed 搜索/文章标题/关键字" />
                    <label for="type-pubmed"><span class="text-muted">文献</span></label>
                </li>
            </ul>
        </div>
        <div class="search-group group-b">
            <ul class="search-provider">
                <li>
                    <input type="radio" name="provider" hidden id="type-baidu1" value="https://www.baidu.com/s?wd=" data-placeholder="百度一下，你就知道" />
                    <label for="type-baidu1"><span class="text-muted">百度</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-google1" value="https://www.google.com/search?q=" data-placeholder="谷歌搜索" />
                    <label for="type-google1"><span class="text-muted">谷歌</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-360" value="https://www.so.com/s?q=" data-placeholder="360 好搜" />
                    <label for="type-360"><span class="text-muted">360</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-sogo" value="https://www.sogou.com/web?query=" data-placeholder="搜狗搜索" />
                    <label for="type-sogo"><span class="text-muted">搜狗</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-bing1" value="https://cn.bing.com/search?q=" data-placeholder="微软 Bing 搜索" />
                    <label for="type-bing1"><span class="text-muted">必应</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-sm" value="https://yz.m.sm.cn/s?q=" data-placeholder="UC 移动端搜索" />
                    <label for="type-sm"><span class="text-muted">神马</span></label>
                </li>
            </ul>
        </div>
        <div class="search-group group-c">
            <ul class="search-provider">
                <li>
                    <input type="radio" name="provider" hidden id="type-br" value="https://rank.chinaz.com/all/" data-placeholder="请输入网址(不带 https://)" />
                    <label for="type-br"><span class="text-muted">权重查询</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-links" value="https://link.chinaz.com/" data-placeholder="请输入网址(不带 https://)" />
                    <label for="type-links"><span class="text-muted">友链检测</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-whois" value="https://who.is/whois/" data-placeholder="请输入网址(不带 https://)" />
                    <label for="type-whois"><span class="text-muted">域名信息查询</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-ping" value="https://ping.chinaz.com/" data-placeholder="请输入网址(不带 https://)" />
                    <label for="type-ping"><span class="text-muted">PING 检测</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-404" value="https://tool.chinaz.com/Links/?DAddress=" data-placeholder="请输入网址(不带https://)" />
                    <label for="type-404"><span class="text-muted">死链检测</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-ciku" value="https://www.ciku5.com/s?wd=" data-placeholder="请输入关键词" />
                    <label for="type-ciku"><span class="text-muted">关键词挖掘</span></label>
                </li>
            </ul>
        </div>
        <div class="search-group group-d">
            <ul class="search-provider">
                <li>
                    <input type="radio" name="provider" hidden id="type-zhihu" value="https://www.zhihu.com/search?type=content&q=" data-placeholder="知乎" />
                    <label for="type-zhihu"><span class="text-muted">知乎</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-wechat" value="https://weixin.sogou.com/weixin?type=2&query=" data-placeholder="微信" />
                    <label for="type-wechat"><span class="text-muted">微信</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-weibo" value="https://s.weibo.com/weibo/" data-placeholder="微博" />
                    <label for="type-weibo"><span class="text-muted">微博</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-douban" value="https://www.douban.com/search?q=" data-placeholder="豆瓣" />
                    <label for="type-douban"><span class="text-muted">豆瓣</span></label>
                </li>
            </ul>
        </div>
        <div class="search-group group-e">
            <ul class="search-provider">
                <li>
                    <input type="radio" name="provider" hidden id="type-taobao1" value="https://s.taobao.com/search?q=" data-placeholder="淘宝" />
                    <label for="type-taobao1"><span class="text-muted">淘宝</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-jd" value="https://search.jd.com/Search?keyword=" data-placeholder="京东" />
                    <label for="type-jd"><span class="text-muted">京东</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-xiachufang" value="https://www.xiachufang.com/search/?keyword=" data-placeholder="下厨房" />
                    <label for="type-xiachufang"><span class="text-muted">下厨房</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-xiangha" value="https://www.xiangha.com/so/?q=caipu&s=" data-placeholder="香哈菜谱" />
                    <label for="type-xiangha"><span class="text-muted">香哈菜谱</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-12306" value="https://www.12306.cn/?" data-placeholder="12306" />
                    <label for="type-12306"><span class="text-muted">12306</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-qunar" value="https://www.qunar.com/?" data-placeholder="去哪儿" />
                    <label for="type-qunar"><span class="text-muted">去哪儿</span></label>
                </li>
            </ul>
        </div>
        <div class="search-group group-f">
            <ul class="search-provider">
                <li>
                    <input type="radio" name="provider" hidden id="type-zhaopin" value="https://sou.zhaopin.com/jobs/searchresult.ashx?kw=" data-placeholder="智联招聘" />
                    <label for="zhaopin"><span class="text-muted">智联招聘</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-51job" value="https://search.51job.com/?" data-placeholder="前程无忧" />
                    <label for="type-51job"><span class="text-muted">前程无忧</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-lagou" value="https://www.lagou.com/jobs/list_" data-placeholder="拉钩网" />
                    <label for="type-lagou"><span class="text-muted">拉钩网</span></label>
                </li>
                <li>
                    <input type="radio" name="provider" hidden id="type-liepin" value="https://www.liepin.com/zhaopin/?key=" data-placeholder="猎聘网" />
                    <label for="type-liepin"><span class="text-muted">猎聘网</span></label>
                </li>
            </ul>
        </div>
    </div>
</div>


<script>
    // Search -----------------------
    $(document).ready(function(){
        superSearch();
    });
    
    function superSearch() {
        if (window.localStorage.getItem("searchlist")) {
            $(".hide-type-list input#" + window.localStorage.getItem("searchlist")).prop("checked", true);
            $(".hide-type-list input#m_" + window.localStorage.getItem("searchlist")).prop("checked", true);
        }
        if (window.localStorage.getItem("searchlistmenu")) {
            $(".s-type-list.big label").removeClass("active");
            $(".s-type-list [data-id=" + window.localStorage.getItem("searchlistmenu") + "]").addClass("active");
        }
        toTarget($(".s-type-list.big"), false, false);
        $(".hide-type-list .s-current").removeClass("s-current");
        $('.hide-type-list input:radio[name="provider"]:checked').parents(".search-group").addClass("s-current");
    
        $(".search-form").attr("action", $(".hide-type-list input:radio:checked").val());
        $(".search-key").attr("placeholder", $(".hide-type-list input:radio:checked").data("placeholder"));
        if (window.localStorage.getItem("searchlist") == "type-zhannei") {
            $(".search-key").attr("zhannei", "true");
        }
    }
    
    function toTarget(menu, padding, isMult) {
        var slider = menu.children(".anchor");
        var target = menu.children(".hover").first();
        if (target && 0 < target.length) {
            //
        } else {
            if (isMult) {
                target = menu.find(".active").parent();
            } else {
                target = menu.find(".active");
            }
        }
        if (0 < target.length) {
            if (padding) {
                slider.css({
                    left: target.position().left + target.scrollLeft() + "px",
                    width: target.outerWidth() + "px",
                    opacity: "1",
                });
            } else {
                slider.css({
                    left: target.position().left + target.scrollLeft() + target.outerWidth() / 4 + "px",
                    width: target.outerWidth() / 2 + "px",
                    opacity: "1",
                });
            }
        } else {
            slider.css({
                opacity: "0",
            });
        }
    }
    
    $(document).on("click", ".s-type-list label", function (event) {
        //event.preventDefault();
        $(".s-type-list.big label").removeClass("active");
        $(this).addClass("active");
        window.localStorage.setItem("searchlistmenu", $(this).data("id"));
        var parent = $(this).parents(".s-search");
        parent.find(".search-group").removeClass("s-current");
        parent
            .find("#" + $(this).attr("for"))
            .parents(".search-group")
            .addClass("s-current");
        toTarget($(this).parents(".s-type-list"), false, false);
    });
    
    $(".hide-type-list .search-group input").on("click", function () {
        var parent = $(this).parents(".s-search");
        window.localStorage.setItem("searchlist", $(this).attr("id").replace("m_", ""));
        parent.children(".search-form").attr("action", $(this).val());
        parent.find(".search-key").attr("placeholder", $(this).data("placeholder"));
    
        if ($(this).attr("id") == "type-zhannei" || $(this).attr("id") == "m_type-zhannei") {
            parent.find(".search-key").attr("zhannei", "true");
        } else {
            parent.find(".search-key").attr("zhannei", "");
        }
    
        parent.find(".search-key").select();
        parent.find(".search-key").focus();
    });
    
    $(document).on("submit", ".search-form", function () {
        var key = encodeURIComponent($(this).find(".search-key").val());
        if (key == "") {
            return false;
        } else {
            window.open($(this).attr("action") + key);
            return false;
        }
    });

</script>