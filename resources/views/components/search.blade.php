<div id="search" class="s-search">
    <div id="search-list" class="hide-type-list">
        <div class="s-type">
            <div class="s-type-list animated fadeInUp">
                <label for="type-baidu"><?php __('常用') ?></label>
                <label for="type-search"><?php __('搜索') ?></label>
                <label for="type-br"><?php __('工具') ?></label>
                <label for="type-zhihu"><?php __('社区') ?></label>
                <label for="type-taobao1"><?php __('生活') ?></label>
                <label for="type-zhaopin"><?php __('求职') ?></label>
            </div>
        </div>
        <div class="s-groups">
            <div class="search-group group-a">
                <span class="type-text">
                    <?php __('常用') ?>
                </span>
                <ul class="search-type">
                    <li>
                        <input checked hidden type="radio" name="type" id="type-baidu" value="https://www.baidu.com/s?wd=" data-placeholder="<?php __('百度一下') ?>">
                        <label for="type-baidu"><span style="color:#2100E0"><?php __('百度') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-google" value="https://www.google.com/search?q=" data-placeholder="<?php __('谷歌两下') ?>">
                        <label for="type-google"><span style="color:#3B83FA">G</span><span style="color:#F3442C">o</span><span style="color:#FFC300">o</span><span style="color:#4696F8">g</span><span style="color:#2CAB4E">l</span><span style="color:#F54231">e</span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-zhannei" value="#?s=" data-placeholder="<?php __('站内搜索') ?>">
                        <label for="type-zhannei"><span style="color:#888888"><?php __('站内') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-taobao" value="https://s.taobao.com/search?q=" data-placeholder="<?php __('淘宝') ?>">
                        <label for="type-taobao"><span style="color:#f40"><?php __('淘宝') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-bing1" value="https://cn.bing.com/search?q=" data-placeholder="<?php __('微软Bing搜索') ?>">
                        <label for="type-bing1"><span style="color:#007daa">Bing</span></label>
                    </li>
                </ul>
            </div>
            <div class="search-group group-b">
                <span class="type-text"><?php __('搜索') ?></span>
                <ul class="search-type">
                    <li>
                        <input hidden type="radio" name="type" id="type-search" value="https://www.baidu.com/s?wd=" data-placeholder="<?php __('百度一下') ?>">
                        <label for="type-search"><span style="color:#2319dc"><?php __('百度') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-google1" value="https://www.google.com/search?q=" data-placeholder="<?php __('谷歌两下') ?>">
                        <label for="type-google1"><span style="color:#3B83FA">G</span><span style="color:#F3442C">o</span><span style="color:#FFC300">o</span><span style="color:#4696F8">g</span><span style="color:#2CAB4E">l</span><span style="color:#F54231">e</span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-360" value="https://www.so.com/s?q=" data-placeholder="<?php __('360好搜') ?>">
                        <label for="type-360"><span style="color:#19b955">360</span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-sogo" value="https://www.sogou.com/web?query=" data-placeholder="<?php __('搜狗搜索') ?>">
                        <label for="type-sogo"><span style="color:#ff5943"><?php __('搜狗') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-bing" value="https://cn.bing.com/search?q=" data-placeholder="<?php __('微软Bing搜索') ?>">
                        <label for="type-bing"><span style="color:#007daa">Bing</span></label></li>
                    <li>
                        <input hidden type="radio" name="type" id="type-sm" value="https://yz.m.sm.cn/s?q=" data-placeholder="<?php __('UC移动端搜索') ?>">
                        <label for="type-sm"><span style="color:#ff8608"><?php __('神马') ?></span></label>
                    </li>
                </ul>
            </div>
            <div class="search-group group-c">
                <span class="type-text"><?php __('工具') ?></span>
                <ul class="search-type">
                    <li>
                        <input hidden type="radio" name="type" id="type-br" value="https://rank.chinaz.com/all/" data-placeholder="<?php __('请输入网址(不带http://)') ?>">
                        <label for="type-br"><span style="color:#55a300"><?php __('权重查询') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-links" value="https://link.chinaz.com/" data-placeholder="<?php __('请输入网址(不带http://)') ?>">
                        <label for="type-links"><span style="color:#313439"><?php __('友链检测') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-icp" value="https://icp.aizhan.com/" data-placeholder="<?php __('请输入网址(不带http://)') ?>">
                        <label for="type-icp"><span style="color:#ffac00"><?php __('备案查询') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-ping" value="https://ping.chinaz.com/" data-placeholder="<?php __('请输入网址(不带http://)') ?>">
                        <label for="type-ping"><span style="color:#00599e"><?php __('PING检测') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-404" value="https://tool.chinaz.com/Links/?DAddress=" data-placeholder="<?php __('请输入网址(不带http://)') ?>">
                        <label for="type-404"><span style="color:#f00"><?php __('死链检测') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-ciku" value="https://www.ciku5.com/s?wd=" data-placeholder="<?php __('请输入关键词') ?>">
                        <label for="type-ciku"><span style="color:#016DBD"><?php __('关键词挖掘') ?></span></label>
                    </li>
                </ul>
            </div>
            <div class="search-group group-d">
                <span class="type-text"><?php __('社区') ?></span>
                <ul class="search-type">
                    <li>
                        <input hidden type="radio" name="type" id="type-zhihu" value="https://www.zhihu.com/search?type=content&q=" data-placeholder="<?php __('知乎') ?>">
                        <label for="type-zhihu"><span style="color:#0084ff"><?php __('知乎') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-wechat" value="https://weixin.sogou.com/weixin?type=2&query=" data-placeholder="<?php __('微信') ?>">
                        <label for="type-wechat"><span style="color:#00a06a"><?php __('微信') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-weibo" value="https://s.weibo.com/weibo/" data-placeholder="<?php __('微博') ?>">
                        <label for="type-weibo"><span style="color:#e6162d"><?php __('微博') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-douban" value="https://www.douban.com/search?q=" data-placeholder="<?php __('豆瓣') ?>">
                        <label for="type-douban"><span style="color:#55a300"><?php __('豆瓣') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-why" value="https://ask.seowhy.com/search/?q=" data-placeholder="<?php __('SEO问答社区') ?>">
                        <label for="type-why"><span style="color:#428bca"><?php __('搜外问答') ?></span></label>
                    </li>
                </ul>
                </div>
            <div class="search-group group-e">
                <span class="type-text"><?php __('生活') ?></span>
                <ul class="search-type">
                    <li>
                        <input hidden type="radio" name="type" id="type-taobao1" value="https://s.taobao.com/search?q=" data-placeholder="<?php __('淘宝') ?>">
                        <label for="type-taobao1"><span style="color:#f40"><?php __('淘宝') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-jd" value="https://search.jd.com/Search?keyword=" data-placeholder="<?php __('京东') ?>">
                        <label for="type-jd"><span style="color:#c91623"><?php __('京东') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-xiachufang" value="https://www.xiachufang.com/search/?keyword=" data-placeholder="<?php __('下厨房') ?>">
                        <label for="type-xiachufang"><span style="color:#dd3915"><?php __('下厨房') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-xiangha" value="https://www.xiangha.com/so/?q=caipu&s=" data-placeholder="<?php __('香哈菜谱') ?>">
                        <label for="type-xiangha"><span style="color:#930"><?php __('香哈菜谱') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-12306" value="https://www.12306.cn/?" data-placeholder="12306">
                        <label for="type-12306"><span style="color:#07f">12306</span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-qunar" value="https://www.qunar.com/?" data-placeholder="<?php __('去哪儿') ?>">
                        <label for="type-qunar"><span style="color:#00afc7"><?php __('去哪儿') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-快递100" value="https://www.kuaidi100.com/?" data-placeholder="<?php __('快递100') ?>">
                        <label for="type-快递100"><span style="color:#3278e6"><?php __('快递100') ?></span></label>
                    </li>
                </ul>
            </div>
            <div class="search-group group-f">
                <span class="type-text"><?php __('求职') ?></span>
                <ul class="search-type">
                    <li>
                        <input hidden type="radio" name="type" id="type-zhaopin" value="https://sou.zhaopin.com/jobs/searchresult.ashx?kw=" data-placeholder="<?php __('智联招聘') ?>">
                        <label for="type-zhaopin"><span style="color:#689fee"><?php __('智联招聘') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-51job" value="https://search.51job.com/?" data-placeholder="<?php __('前程无忧') ?>">
                        <label for="type-51job"><span style="color:#ff6000"><?php __('前程无忧') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-lagou" value="https://www.lagou.com/jobs/list_" data-placeholder="<?php __('拉钩网') ?>">
                        <label for="type-lagou"><span style="color:#00b38a"><?php __('拉钩网') ?></span></label>
                    </li>
                    <li>
                        <input hidden type="radio" name="type" id="type-liepin" value="https://www.liepin.com/zhaopin/?key=" data-placeholder="<?php __('猎聘网') ?>">
                        <label for="type-liepin"><span style="color:#303a40"><?php __('猎聘网') ?></span></label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <form action="?s=" method="get" target="_blank" id="super-search-fm">
        <input type="text" id="search-text" placeholder="输入关键字搜索" style="outline:0">
        <button type="submit"><i class="fa fa-search "></i></button>
    </form>
    <div class="set-check hidden-xs">
        <input type="checkbox" id="set-search-blank" class="bubble-3" autocomplete="off">
    </div>
</div>
