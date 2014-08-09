<?php

/*
 * Copyright (c) 2014 Scott Zeid.  <http://s.zeid.me/>
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 * Except as contained in this notice, the name(s) of the above copyright holders
 * shall not be used in advertising or otherwise to promote the sale, use or
 * other dealings in this Software without prior written authorization.
 * 
 */


if (stristr($_SERVER["REQUEST_URI"], "/gnu") !== false ||
    stristr($_SERVER["HTTP_HOST"], "gnu")) {
 $linux = "GNU/Linux";
 $gnu = true;
 $url = "http://gnu.amirunninglinux.com/";
 $novelty = "gnu";
} else {
 $linux = "Linux";
 $gnu = false;
 $url = "http://amirunninglinux.com/";
 $novelty = "";
}

if (isset($_GET["birthday"]))
 $novelty = "birthday";

if (isset($_GET["linux"]) || isset($_GET["gnu-linux"]))
 $is_linux = true;
else
 $is_linux = (stripos($_SERVER["HTTP_USER_AGENT"], "Linux") !== false ||
              (!$gnu && stripos($_SERVER["HTTP_USER_AGENT"], "Android") !== false));

if ($gnu && stripos($_SERVER["HTTP_USER_AGENT"], "Android"))
 $is_linux = false;

if (stripos($_SERVER["HTTP_USER_AGENT"], "CrOS"))
 $is_linux = true;

if (isset($_GET["not-linux"]) || isset($_GET["!linux"]) || $_GET["linux"] === "0" ||
    strtolower($_GET["linux"]) === "false" || strtolower($_GET["linux"]) === "no")
 $is_linux = false;

if (isset($_GET["not-gnu-linux"]) || isset($_GET["!gnu-linux"]) ||
    $_GET["gnu-linux"] === "0" || strtolower($_GET["gnu-linux"]) === "false" ||
    strtolower($_GET["gnu-linux"]) === "no")
 $is_linux = false;

// isolate extra query string parameters so they can be appended to permalink URLs
$exclude_params = array(
 "linux", "not-linux", "!linux",
 "gnu-linux", "not-gnu-linux", "!gnu-linux"
);
$query_params = array();
$query_params_all = array();

parse_str($_SERVER["QUERY_STRING"], $query_params_all);
foreach ($query_params_all as $k => $v) {
 if (!in_array($k, $exclude_params))
  $query_params[$k] = $v;
}

$query_params = http_build_query($query_params);
$query_params_all = http_build_query($query_params_all);

$query_params = preg_replace('/=($|&)/', '$1', $query_params);
$query_params_all = preg_replace('/=($|&)/', '$1', $query_params_all);

if (!empty($query_params))
 $query_params = "&$query_params";
if (!empty($query_params_all))
 $query_params_all = "&$query_params_all";

$query_params_html = htmlspecialchars($query_params);
$query_params_all_html = htmlspecialchars($query_params_all);

?><!DOCTYPE html>

<?php if ($gnu): ?>
<html class="gnu">
<?php else: ?>
<html class="non-gnu">
<?php endif ?>
 <head>
  <meta charset="utf-8" />
  <!--
   
   Copyright (c) 2014 Scott Zeid.  <http://s.zeid.me/>
   
   Permission is hereby granted, free of charge, to any person obtaining a copy
   of this software and associated documentation files (the "Software"), to deal
   in the Software without restriction, including without limitation the rights
   to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
   copies of the Software, and to permit persons to whom the Software is
   furnished to do so, subject to the following conditions:
   
   The above copyright notice and this permission notice shall be included in
   all copies or substantial portions of the Software.
   
   THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
   IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
   AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
   LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
   OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
   THE SOFTWARE.
   
   Except as contained in this notice, the name(s) of the above copyright holders
   shall not be used in advertising or otherwise to promote the sale, use or
   other dealings in this Software without prior written authorization.
   
  -->
<?php if (isset($_GET["xp"])): ?>
  <title>Windows XP End of Service</title>
<?php elseif ($novelty == "birthday"): ?>
  <title>Happy birthday!</title>
<?php else: ?>
  <title>Are you running <?php echo $linux; ?>?</title>
<?php endif ?>
  <meta name="description" content="See if you're running <?php echo $linux; ?>, the world's best operating system." />
  <meta name="viewport" content="width=480, initial-scale=.75, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script type="text/javascript" src="html5shiv.js"></script>
  <script type="text/javascript" src="html5shiv-printshiv.js"></script>
<?php if (preg_match('/(www\.)?(gnu\.)?(amirunninglinux\.com)(\.?)(\:[0-9]+)?$/',
          $_SERVER["HTTP_HOST"])): ?>
  <script type="text/javascript">
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
   
   ga('create', 'UA-382238-14', 'amirunninglinux.com');
   ga('send', 'pageview');
  </script>
<?php endif ?>
 </head>
<?php if ($is_linux): ?>
 <body class="linux">
  <header id="top">
   <div><div>
    <strong>
     <u<?php if (isset($_GET["caps"])) echo ' style="text-transform: uppercase;"'; ?>>
<?php if ($novelty == "birthday"): ?>
      Happy birthday<?php if (!empty($_GET["birthday"]))
                           echo ", ".htmlspecialchars($_GET["birthday"]); ?>!
      <br />
      <br />
      You deserve it for using <?php echo $linux; ?>, the world's BEST operating
      system!
<?php else: ?>
      <span class="status">You ARE</span> running <?php echo $linux; ?>!
<?php endif ?>
     </u>
    </strong>
   </div></div>
  </header>
  <main id="main">
   <h1>Congratulations!  You're awesome!  :)</h1>
   <p>
    Now go celebrate in
    <a href="https://pay.reddit.com/r/LinuxCirclejerk">/r/LinuxCirclejerk</a>!
   </p>
  </main>
<?php else: ?>
 <body class="not-linux">
  <header id="top">
   <div><div>
    <strong>
     <u<?php if (isset($_GET["caps"])) echo ' style="text-transform: uppercase;"'; ?>>
<?php if ($novelty == "birthday"): ?>
      Happy birthday<?php if (!empty($_GET["birthday"]))
                           echo ", ".htmlspecialchars($_GET["birthday"]); ?>!
      <br />
      <br />
      Now get a <em>REAL</em> operating system, like <?php echo $linux; ?>!
<?php else: ?>
      <span class="status">You are NOT</span> running <?php echo $linux; ?>!
<?php endif ?>
     </u>
    </strong>
   </div></div>
  </header>
  <main id="main">
<?php if (!$novelty): ?>
   <h1>Let's fix that, shall we?  :)</h1>
<?php else: ?>
   <h1>Let's switch to <?php echo $linux; ?>, shall we?  :)</h1>
<?php endif ?>
   <section id="desktop">
    <h2>If you are seeing this on a desktop or laptop:</h2>
    <p>
     <a href="http://www.ubuntu.com/">Ubuntu</a> and
     <a href="http://www.linuxmint.com/">Linux Mint</a>
     are some good distributions to start with.
    </p>
    <p>
     If you prefer more of a challenge, try
     <a href="https://fedoraproject.org/">Fedora</a>,
     <a href="https://www.debian.org/">Debian</a>,
     <a href="https://www.archlinux.org/">Arch Linux</a>, or
     <a href="https://www.gentoo.org/">Gentoo</a>
     (in increasing order of difficulty).
    </p>
   </section>
   <section id="mobile">
    <h2>If you are seeing this on a phone or tablet:</h2>
<?php if ($gnu): ?>
    <p>
     You should buy a new one that runs
     <a href="http://www.ubuntu.com/phone">Ubuntu</a> or
     <a href="https://www.sailfishos.org/">Sailfish OS</a>,
     or install one of them on your existing device if you can.
    </p>
<?php else: ?>
    <p>
     You should
     <a href="https://play.google.com/store/devices/">buy a new one</a>
     that runs <a href="http://www.android.com/">Android</a>.
     (Android is based on Linux.)
    </p>
    <p>
     You may also want to take a look at
     <a href="https://www.mozilla.org/firefox/os/">Firefox OS</a>,
     <a href="http://www.ubuntu.com/phone">Ubuntu</a>, or
     <a href="https://www.sailfishos.org/">Sailfish OS</a>.
    </p>
<?php endif ?>
   </section>
  </main>
<?php endif ?>
<?php if ($is_linux) echo promo(); ?>
  <section id="why">
   <h1>Why use <?php echo $linux; ?>?</h1>
   <h2><?php echo $linux; ?> is more secure than other operating systems.</h2>
   <p>
    Since <?php echo $linux; ?> is open-source, anyone can examine its code and
    fix or report any vulnerabilities they find.  This means that security problems
    get fixed quicker than in other operating systems, making it more difficult
    for attackers to target <?php echo $linux; ?> machines.
   </p>
   <p>
    With <?php echo $linux; ?>, software is installed and updated using a
    centralized package manager.  Each distribution cryptographically signs
    their packages, making it almost impossible for an attacker to replace
    the software you use with malicious versions without getting caught.
   </p>
   <h2><?php echo $linux; ?> respects your freedoms.</h2>
   <p>
    <?php echo $linux; ?> is
    <a href="https://gnu.org/philosophy/free-sw.html">Free Software</a>,
    which means that it respects your freedoms to use, modify, and share it
    and anything you create using <?php echo $linux; ?>.  You are free to use
    <?php echo $linux; ?> for any purpose, commercial or otherwise, without any
    restrictions.
   </p>
   <p>
    Other operating systems usually do not allow you to modify or share them,
    or even to just look at their source code to make sure they're not doing
    anything nasty.  Also, their vendors may restrict what you do with them,
    e.g. how many devices you can connect to your computer (Windows and OS X),
    whether you can run a server using your computer (Windows and OS X),
    whether you can use your computer for commercial purposes (OS X and
    some Windows licenses), whether you can connect to your computer
    remotely (Windows and OS X), or whether you can run the operating
    system on unapproved hardware (OS X).
   </p>
   <p>
    Some operating system vendors, including Microsoft and Apple, do
    not allow you to use their operating systems to break the law.  Now,
    this is perfectly fine when it comes to just laws (and you still have
    to follow them anyway), but you may also be subject to unjust laws,
    like laws prohibiting protests, acts of civil disobedience, or
    criticizing the government, or other censorship laws, that you
    should be able to break.
   </p>
   <p>
    Some operating system vendors, like Microsoft, also require you to
    agree to binding arbitration in order to use their operating systems.
    This is bad for many reasons, but especially because it restricts
    your access to the courts and your ability to participate in
    class-action lawsuits.
   </p>
   <p>
    <strong>
     Your computer should not be able to tell you what you can and cannot
     do.
    </strong>
    <br />
    <br />
    And if you're running <?php echo $linux; ?>, it <strong>won't</strong>.
   </p>
  </section>
<?php if (!$is_linux) echo promo(); ?>
  <footer id="footer">
   <p>
<?php if ($gnu): ?>
<?php if ($is_linux): ?>
    <a href="?gnu-linux<?php echo $query_params_html; ?>">Permalink</a> (<a href="?not-gnu-linux<?php echo $query_params_html; ?>">non-<?php echo $linux; ?> version</a>)
<?php else: ?>
    <a href="?not-gnu-linux<?php echo $query_params_html; ?>">Permalink</a> (<a href="?gnu-linux<?php echo $query_params_html; ?>"><?php echo $linux; ?> version</a>)
<?php endif ?>
<?php else: ?>
<?php if ($is_linux): ?>
    <a href="?linux<?php echo $query_params_html; ?>">Permalink</a> (<a href="?not-linux<?php echo $query_params_html; ?>">non-<?php echo $linux; ?> version</a>)
<?php else: ?>
    <a href="?not-linux<?php echo $query_params_html; ?>">Permalink</a> (<a href="?linux<?php echo $query_params_html; ?>"><?php echo $linux; ?> version</a>)
<?php endif ?>
<?php endif ?>
   </p>
   <p>
    Copyright &copy; 2014 <a href="http://s.zeid.me/" target="_blank">Scott Zeid</a>.
    <a href="http://code.s.zeid.me/amirunninglinux.com">Released</a>
    under <a href="LICENSE.txt">the X11 License</a>.
   </p>
   <p>
    Lovingly hand-crafted in <a href="http://www.vim.org/" target="_blank">Vim</a>.
   </p>
   <p><a href="http://web.archive.org/web/20140726223138/http://www.amirunningxp.com/" target="_blank">Inspiration</a></p>
  </footer>
 </body>
</html>
<?php

function promo() { global $gnu, $is_linux, $linux; ?>
  <section id="share">
   <h1>Share this site with your friends!</h1>
   <p class="faint">
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode($url); ?>" target="_blank">Facebook</a>
    &bull;
    <a href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode($url); ?>&amp;text=Are%20you%20running%20<?php echo rawurlencode($linux); ?>%3F" target="_blank">Twitter</a>
    &bull;
    <a href="https://plus.google.com/share?url=<?php echo rawurlencode($url); ?>" target="_blank">Google+</a>
    &bull;
    <a href="https://pay.reddit.com/submit?url=<?php echo rawurlencode($url); ?>&amp;title=Are%20you%20running%20<?php echo rawurlencode($linux); ?>%3F" target="_blank">reddit</a>
    &bull;
    <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo rawurlencode($url); ?>&amp;description=Are%20you%20running%20<?php echo rawurlencode($linux); ?>%3F" target="_blank">Pinterest</a>
    &bull;
    <a href="https://www.linkedin.com/cws/share?isFramed=false&amp;url=<?php echo rawurlencode($url); ?>" target="_blank">LinkedIn</a>
   </p>
  </section>
<?php if (!$gnu): ?>
  <section id="app">
   <h1>NEW!  Get the Android app!</h1>
   <p class="faint">
    <a href="https://play.google.com/store/apps/details?id=com.amirunninglinux">Google Play</a>
    &bull;
    <a href="http://code.s.zeid.me/amirunninglinux.apk/downloads">APK on Bitbucket</a>
    &bull;
    <a href="http://code.s.zeid.me/amirunninglinux.apk/src">Source on Bitbucket</a>
   </p>
  </section>
<?php endif ?>
<?php }

?>
