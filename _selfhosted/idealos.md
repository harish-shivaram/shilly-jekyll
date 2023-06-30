---
title: A distro, a distro... my kingdom for a distro
description: There are 32 distributions which support Raspberry Pi today, according to distro-watch. But which one meets the needs...
lastmod: 2023-06-26
toc: true
image: /images/selfhosted/puzzled-tux.png
---

## Which Distribution?

A distribution is a packaging flavour. There are innumerable ways of bundling software along with the operating system. Some are general purpose, and include a broad selection of software. Some are very specific, intended so that the machine does exactly one task and nothing else. And then, there is everything else in between.

The best distro is simply one which does the job at hand with minimum of fuss.

Our job is self-hosting, which can mean several different things to different people. At the very minimum, this is what it should have:
- *Good networking abilities*. It should provide a broad selection of network services and tools.
- *Wireguard tunnels support*. This is critical if your ISP hosts customers in a CG-NAT network, rather than provide a direct IP. Even otherwise, this is good to have for security purposes.
- *File server capabilities*. SMB/CIFS, or specifically, the samba suite. Ability to read/write several commonly used file systems
- *Container infra*. Specifically docker containers. 
- *Good documentation*. This is usually only available for the most popular distros. But maybe they are popular because of good documentation...
- *Reasonably frequent updates*. Distributions have an update cycle, which can be anything between a month to a year and a half. On the other extreme is the rolling-release distros, which are updated continuously.
- *A server flavour*. Most distros tout their extensively user-friendly graphical interfaces, talking about how effective they are when compared to mainstream desktop X. But we plan to run the box as a "server". Without a monitor, or a keyboard or mouse. Only way to do that is to start with the "server" flavour, sometimes called the "Minimal" or "CLI" flavour.

## Recommendation

### Raspberry PI

There are several distributions which support the Raspberry PI natively, and have a server flavour.

1. ![Raspberry PI OS](/images/selfhosted/Raspberry_Pi_OS_Logo.png){:.image .right}  The Raspberry Foundation has their own flavour of Debian, called Raspberry PI OS. This even used to be called Raspbian. This is designed to run on ALL Raspberry PI's, from the oldest version 1 to the latest and greatest. As a result, this isn't best optimised for the newest hardware available. But on the other side, this is the reference distribution, and has extensive documentation. Most applications and guides for Raspberry PI simply assume you are running Raspberry PI OS.

2. ![Ubuntu](/images/selfhosted/ubuntu.png){:.image .right} Ubuntu is available for Raspberry PI's, but for version 2 onwards. This should be OK, since Raspberry PI 1's are very old and not easy to come by. This is the most popular distribution, and has the widest documentation and support. Any issue you can possibly hit would have been hit by others before, and have details for a solution available online. The release is also sure to be more optimal than the one from Raspberry PI.

3. ![ArchLinuxARM](/images/selfhosted/alarm.png){:.image .right} ArchLinuxARM if you prefer a rolling release. Again, extensive documentation and a wide user base, but maybe not so much for ARM. The basic goal here is to provide a regular ArchLinux server on the ARM SBC. Since there are no optimizations which are specific for the SBC environment, a lot of mucking about is required to get it SBC-ready, so to speak. Things which we can get for free elsewhere

4. ![Armbian](/images/selfhosted/armbian.png){:.image .right} Armbian is a distribution customized to several dozens of ARM based single-board computers, including the latest Raspberry PI. Frankly, it is surprising that they even bothered to support Raspberry PI, since they arose from the lack of good support for all HW that is NOT Raspberry PI. Still, this distribution is custom designed to run on SBC's which none of the others have.

5. ![DietPI](/images/selfhosted/dietpi.png){:.image .right} DietPI is another distribution similar to Armbian in that it supports several ARM SBCs. DietPI has taken a different approach than Armbian. While they are also based on Debian, and are well optimized for the SBC environment, DietPI provides a series of console menus to perform routine tasks... installing SW, performing updates, changing system, configuration etc. The user never needs to use a shell command with DietPI.

5. OpenSUSE, Kali, Alpine, Devuan... all have a Raspberry PI specific flavour. The ease of installation and support available for each varies, though.

BSD's do not have docker support, so they should be avoided.

### Any other SBC

1. ![Armbian](/images/selfhosted/armbian.png){:.image .right} For any other ARM based SBC, the best choice, by far, is Armbian. All Armbian ports are based on either Debian or Ubuntu. They are updated frequently and have detailed documentation. All SBC's have a server (CLI) and graphical installer flavours. Most importantly, Armbian is optimized to run on SBCs in several ways.

   For example, they include infra to monitor sensors on the HW they are running. Sensors are very HW specific, and the good folks at Armbian have taken the pain to support all the sensors of each SBC. Another small gesture is the enabling of zram by default, increasing the available memory at the cost of a few extra CPU cycles. This is a very useful feature to have. They have an well thought out first-boot process which expands file system, and provides an infra to set up the device even if using it in headless mode (no monitor/keyboard/mouse).

   They include detailed documentation on preparing the HW to install Armbian, which sometimes involves removing buggy firmware shipped from the HW manufacturer. Some SBC boards have quirks and idiosycracies, which do not affect all boards. Armbian seems to be the only distribution which acknowledges these issues and provides work arounds.

   The only downside, if it can be called that, is that they do not have a rolling release. This is more of a shortcoming of the upstream (Debian/Ubuntu) than Armbian. Ever so frequently this necessitates reinstalling the whole OS to stay cutting-edge.

2. ![DietPI](/images/selfhosted/dietpi.png){:.image .right} For those with a strong aversion to ever using a command line interface (the black screen where you can type stuff), choose DietPI. Much like Armbian, it is based on Debian under the hood. It supports several dozen SBCs and is very optimized for each of the SBCs. What is unique about DietPI is that is provides a series of console menus to perform routine tasks... installing SW, performing updates, changing system, configuration etc. The user never needs to use a shell command with DietPI.

3. ![ArchLinuxARM](/images/selfhosted/alarm.png){:.image .right} For those with an aversion to Debian and/or Ubuntu, ArchLinuxARM is an alternative. This also supports a number of SBC's and has good installation instructions. But there are a few hiccups. It is not beginner friendly, and expects the users to have a base linux machine to start with. There are no SBC specific optimizations. The installed system is identical to an ArchLinux desktop, for the most part.

### x86-64

This platform has the widest possible range of choices for a server operating system. Everything from the popular Ubuntu/Debian to cloud native distros can fit the bill. This is a matter of user preference, entirely.

Each person has their favourite distribution, so a recommendation is moot. Any of the mainstream distros could work: the tried-and-tested Ubuntu, ArchLinux, Debian, RedHat/Centos and clones, Fedora or OpenSUSE. All three are well supported, and have very good documentation, and most importantly, have a "server" flavour distro. They have good installers and are well documented. Except for maybe ArchLinux which , as mentioned before, is not a beginner's distro, but it still has very good and detailed documentation. 

## Summing Up

It seems like this page is all "Debian! Debian! Ubuntu! Ubuntu!".

Actually, I am not a great fan of the Debian-Ubuntu family of distros. But there are certain advantages one gets with going with one of these.
- They work well with low resources. The base operating system is pared down with no bells or whistles
- They are very stable. The whole OS is very well put-together, with no loose ends.
- The packaging is lightweight. The APT/DPKG infra is far less resource intensive that the YUM/RPM and DNF/RPM family, which just do not work well in low-memory situations
- Documentation is extensive. A google search with any issue will almost certainly yield a solution for any esoteric issue.
- And, the community is very active. With any hiccup you might face, at least one other person would have faced something similar and will have a solution on the forums.

That said, it is not like the other distributions are far behind. **ArchLinux** (both x86 and ARM) is also a great choice, if a little more effort intensive. The downside is that installing **ArchLinuxARM** will result in a regular ArchLinux-like box. This is not tuned for SBCs and does not automate the processes such as file system expansion etc.

**Alpine Linux** is another great choice, but there may be a bit of a learning curve there. Alpine is extremely light-weight, and completely pared down. But while SBC's and Raspberry PIs are supported, their main target market is containers. One needs to jump through some hoops to get it working on an SBC.

**DietPI Linux**, mentioned above, is another excellent choice for beginners. Under the hood it is Debian again, but that part is well curtained off from the user by a set of menus.
