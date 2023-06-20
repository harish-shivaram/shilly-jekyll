---
title: Home Server Options
description: A personal server... some options which will suit the purpose
lastmod: 2023-06-20
image: /images/selfhosted/single-board-computers.jpg
sequence: 5
---

Servers used commercially in data centers and enterprises are huge expensive pieces of hardware, which are designed to work continuously, with zero downtime. To this end, they are generally built with multiple redundancies... they have multiple power supplies, multiple fans, and multiple hard disks configured using RAID, a technology which can tolerate one or more hard disk failures with no loss of data.

All this redundancy and uptime guarantees comes at a price; a price much higher than consumer hardware which perfoms the same task. But that said, modern consumer hardware is also quite reliable, as long as you pick the right pieces.

## Start Small

We do not start by trying to replicate a commercial server in performance. We start small, by using cheap hardware, and build the capabilities that are provided by commercial servers. The best place to start is qith single-board computers, abbreviated as "SBCs".

### Raspberry PI Family

These are by far the most popular general-purpose SBCs available, and are ideally suited for building a home server. They do not use fans (unless added as after-market), and provide multiple interfaces to add in the peripherals needed to build a home server.

The current generation Raspberry Pi 4 comes in 3 flavours: 2G, 4G and 8G, indicating the amount of RAM the board has on it. This is a crucial decision as, unlike desktops and servers, SBCs' RAM cannot be upgraded. As we discussed before, RAM is indispensible. More RAM is always good.

RPi boards use an SD card as their OS storage. The smallest size SD cards commonly available is 32G, which is more than enough to hold all operating system data.

At the very minimum, this is what is needed to set up a raspberry pi based server:
1. The Raspberry Pi itself.
2. An Micro-SD card (sometimes called a TF card), 32G or more.
3. A way to read/write to the micro-SD card. Some laptops have this built in. 
4. A good power supply. The ones made by the RPi foundation itself is very good, though a little expensive
5. A case. Again, the one made by the foundation is good, though there are several after-market cases to choose from
6. (optional) ethernet patch cable
7. (optional) a USB keyboard and mouse
8. Storage. A decent USB3 hard disk should do. One powered independently and not through the USB is ideal.

### ODroid (Specifically, HC4)

The ODroid family of SBC's from Hardkernel are similar to Raspberry Pis. They also use 64-bit ARM processors from various vendors. There are severral variants of the ODroid SBCs, but the one that is of most interest is the HC4.

This SBC is designed specifically to be used as a home server. The HC stands for Home Cloud. This SBC features 4G RAM, and 2 SATA connectors, allowing you to connect 2 SATA disks; these are the internal disks used in desktops and laptops. The disk can simply be plugged in into a slot on top of the HC4's case. So here we would need:
1. The ODroid HC4. It comes with a case and power supply. There is a variant with an LCD display, but that is optional.
2. MicroSD card, and a reader for the same
3. (optional) ethernet patch cable
4. (optional) a USB keyboard and mouse
5. Up to 2 SATA storage disks. Either HDD or SSD, or even one of each can be used.

### Khadas, Orange PI, Banana PI, Rock Pi and more PIs

Khadas, Orange PI, Rock PI and Banana PI all make SBC's which are similar to Raspberry PI, with better capabilities in some areas; better memory  andwidth, or peripheral bandwidth. Some have built-in storage, faster networking, more interfaces, better graphics capabilities etc. Any one of these can be used as a home server, and the list of things needs to set it up remains the same as it would for a Raspberry PI.

While the obvious upside is the better performance, remember these are nowhere near as ubiquitous or well supported as the Raspberry PI is. Still, it is good enough to run most common applications for a home server.

## The Beefier End

Mini-PC's are essentially miniature desktops designed to be spirited away behind in monitor or a desk, but seem almost tailor-made to work in the role of a home-server. While at the outset, it seems like it would be more expensive than a Raspberry PI, it actually works out cheaper in the long run, and provides some capabilities which a SBC would not.

Most Mini-PCs have upgradable RAM; in fact, they are generally sold without RAM, and the RAM has to be bought separately and installed. Similarly, they have either SATA or M.2 interfaces to install storage, providing much faster storage than USB3 based storage. There are some manufacturers who sell with Windows pre-installed. This is not very useful, as Windows isn;t the best operating system for a server, and it also drives up the price of the equipment. 

Some common vendors are:
1. Intel. They make the  NUC series of MiniPCs, with processors ranging from the basic Celeron to the very high-end i7 and i9 processors. The lower end processors are cheaper and fanless, though obviously not as fast.
2. Asus. They make MiniPCs with either Intel or AMD processors, again with a range of processors.
3. Gigabite. They make a Brix series of MiniPCs.

## Full on Data Centre Starter Kit

Many companies sell their old servers and workstations through resellers who refurbish them and sell them at quite cheap rates. These servers, though too old for a corporate entity, is more than sufficient for a home server.

But be warned. These servers would have rather finicky power requirements and may have loud and noisy fans, making them unsuitable for home use.
