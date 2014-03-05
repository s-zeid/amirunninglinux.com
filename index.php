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

if (isset($_GET["linux"]))
 $linux = true;
else if (isset($_GET["not-linux"]) || isset($_GET["!linux"]) || $_GET["linux"] === "0" ||
         strtolower($_GET["linux"]) === "false" || strtolower($_GET["linux"]) === "no")
 $linux = false;
else
 $linux = (stripos($_SERVER["HTTP_USER_AGENT"], "Linux") !== false ||
           stripos($_SERVER["HTTP_USER_AGENT"], "Android") !== false);

?><!DOCTYPE html>

<html>
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
<?php else: ?>
  <title>Are you running Linux?</title>
<?php endif ?>
  <meta name="description" content="See if you're running Linux, the world's best operating system." />
  <meta name="viewport" content="width=480; initial-scale=.75; user-scalable=no">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script type="text/javascript" src="html5shiv.js"></script>
  <script type="text/javascript" src="html5shiv-printshiv.js"></script>
<?php if (preg_match('/(www\.)?(amirunninglinux\.com)(\.?)(\:[0-9]+)?$/',
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
<?php if ($linux): ?>
 <body class="linux">
  <header id="top"><div><div>You ARE<wbr /> running Linux!</div></div></header>
  <main id="main">
   <h1>Congratulations!  You're awesome!  :)</h1>
   <p>
    Now go celebrate in
    <a href="https://pay.reddit.com/r/LinuxCirclejerk">/r/LinuxCirclejerk</a>!
   </p>
  </main>
<?php else: ?>
 <body class="not-linux">
  <header id="top"><div><div>You are NOT<wbr /> running Linux!</div></div></header>
  <main id="main">
   <h1>Let's fix that, shall we?  :)</h1>
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
    <p>
     You should
     <a href="https://play.google.com/store/devices/">buy a new one</a>
     that runs <a href="http://www.android.com/">Android</a>.
     (Android is based on Linux.)
    </p>
   </section>
  </main>
  <section id="why">
   <h1>Why use Linux?</h1>
   <h2>Linux is more secure than other operating systems.</h2>
   <p>
    Since Linux is open-source, anyone can examine its code and fix or
    report any vulnerabilities they find.  This means that security problems
    get fixed quicker than in other operating systems, making it more difficult
    for attackers to target Linux machines.
   </p>
   <p>
    With Linux, software is installed and updated using a centralized package
    manager.  Each distribution cryptographically signs their packages, making
    it almost impossible for an attacker to replace the software you use with
    malicious versions without getting caught.
   </p>
   <h2>Linux respects your freedoms.</h2>
   <p>
    Linux is <a href="https://gnu.org/philosophy/free-sw.html">Free Software</a>,
    which means that it respects your freedoms to use, modify, and share it and
    anything you create using Linux.  You are free to use Linux for any purpose,
    commercial or otherwise, without any restrictions.
   </p>
  </section>
<?php endif ?>
  <section id="share">
   <h1>Share this site with your friends!</h1>
   <p>
    <a href="https://www.facebook.com/sharer/sharer.php?u=http://amirunninglinux.com/" target="_blank">Facebook</a>
    &bull;
    <a href="https://twitter.com/intent/tweet?url=http://amirunninglinux.com/&amp;text=Are%20you%20running%20Linux%3F" target="_blank">Twitter</a>
    &bull;
    <a href="https://plus.google.com/share?url=http://amirunninglinux.com/" target="_blank">Google+</a>
    &bull;
    <a href="https://pay.reddit.com/submit?url=http://amirunninglinux.com/&amp;title=Are%20you%20running%20Linux%3F" target="_blank">reddit</a>
    &bull;
    <a href="https://www.pinterest.com/pin/create/button/?url=http://amirunninglinux.com/&amp;description=Are%20you%20running%20Linux%3F" target="_blank">Pinterest</a>
    &bull;
    <a href="https://www.linkedin.com/cws/share?isFramed=false&amp;url=http://amirunninglinux.com/" target="_blank">LinkedIn</a>
   </p>
  </section>
  <footer id="footer">
   <p>
<?php if ($linux): ?>
    <a href="?linux">Permalink</a> (<a href="?not-linux">non-Linux version</a>)
<?php else: ?>
    <a href="?not-linux">Permalink</a> (<a href="?linux">Linux version</a>)
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
   <p><a href="http://amirunningxp.com/" target="_blank">Inspiration</a></p>
  </footer>
 </body>
</html>
