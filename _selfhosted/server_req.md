---
title: Home Server Requirements
description: A personal server... and a great place to start self-hosting
lastmod: 2023-05-26
image: /images/selfhosted/hand-server.jpg
sequence: 3
toc: true
---

Any computer can be re-purposed to perform the job of a Home Server. An old PC,
a small mini-PC, a single-board computer or even an older Android mobile phone
can all be up for the task.

But, in reality, some devices are better suited to run as servers. 

## Always On

A server needs to run constantly. An old PC could potentially run constantly,
but unless it has a fancy (meaning, expensive) power supply, the strain of
powering a CPU will burn out the power supply in a few months.

PCs, and even mini-PCs also have large fans, which are mechanical components.
Again, unless it is an fancy, expensive fan, failures are common when running
continuously. This includes the CPU fans, especially the fans that are sold by
the processor manufacturers along with the processor.

The other big pain-point with fans is the constant whine. Even if the fans are
relatively silent, the sound will carry late at night, giving one the feeling
that they are trying to sleep on a plane.  Not a desirable state.

Single-board computers (SBCs) generally do not have fans, and do not generate
much heat. If kept in a well ventilated area with good heat-sinks, they are
ideal for running constantly. SBCs do not have built-in power supplies, but
most vendors do sell a power supply separately. While the separate supply may
not be much different from an after-market mobile phone charger, they are
better at handling the strain of constant use.

Investing in a UPS is always worthwhile. They are quite cheap, and unobtrusive.

## Processor

The server operating system we would use is Linux, or perhaps one of the BSDs.
Thanks to industry heavyweights investing heavily in making Linux efficient and
portable, Linux runs on pretty much every processor.

PCs and mini-PCs generally use what are known as x86 processors. There are a
few exceptions to this, but generally, it is x86. The x86 family of processors
are very well supported by Linux, as well as most self-hosted applications.
Most x86 processors in the last decade are also 64-bit processors, which is the
most recent standard. It is harder to find good application support for the
older 32-bit standard, but unless the PC is really old (more than 10 years),
that is not a concern.

Single-board computers use a variety of processors. ARM is the most common, but
there are options with x86, MIPS, Risc-V and a few other lesser ones. ARM is
the best supported by applications. Again, the 64-bit standard is the recent
one and is well supported, but the older 32-bit is still widely used. ARM has
gone through many revisions over the years, and the older 32-bits are hard to
find applications for.

Mobile phones all generally use ARM processors, though not necessarily 64-bit.

For most self-hosting use cases, processor speed is not as important for
overall speed of the self-hosted applications. Maximizing the memory and
optimizing the storage is much more important for faster delivery.

## Memory

**There is no substitute for memory, and more memory is always good.**

In PC's and mini-PC's, it is easy to add more memory. Adding memory to older
PC's can get tricky, because of this weird way the pricing of memory works.
The newest, state of the art memory components are always expensive. But
slightly older memory components, which are in wide use are very cheap. But
much older memory, for technology which is 6+ years old, is again very
expensive.

In nearly all single-board computers, memory cannot be added. The memory is
directly fixed on the board, and the best option would be to buy an SBC which
as much memory as possible.

## Storage

There are two factors in storage... size and speed. Generally, the storage to
store all the applications and operating system does not need to be big, but
needs to be fast. On the other hand, storage for media (movies, music, videos,
photos and similar) has to be big, but not necessarily fast.

### Solid state

SSDs come in many variants such as SATA, M.2, NVMe. They are all very fast,
but can get expensive at high capacities.

Almost all SBC's come with a microSD card slot. They use the microSD card as
the primary boot device, meaning it would be device which has the operating
system. SD cards themselves come in many grades, with different capacities.
The fastest ones available today are UHS-II V90, and these tend to be designed
for photography. This isn't a bad thing, though, since the needs of the
photographer are generally aligned with ours.

Some SBCs come with eMMC storage, or an adapter to plug in eMMC storage. This
is preferable to SD cards, since eMMC is faster than SD. But there is no
standardised eMMC slot, and often the best option is to buy the eMMC component
from the same vendor as the SBC.

### Hard Disks

Hard disks are slower than solid state devices, but can scale to much higher
capacities. In fact, it is tricky to find hard disks of small capacities.

I need to clarify the "slower" aspect. Hard disks have moving parts, which
generally stop moving when not in use to extend the life of the parts. When
you start using the hard disk again, there is a spin-up time before the data
can be read, and this causes a lag of 2-3 seconds before the data is
available. Once the disk is "hot", the data access are generally quite fast. 

Another point to keep in mind is that hard disks come in different grades.
 - "Desktop" hard disks are middling reliable, and fast at random access
 - "NAS" hard disks are much more reliable than desktop, and also fast at
   random access
 - "Server" hard disks are highly reliable, and fast at random access
 - "Archival" hard disks are highly reliable, but very slow to access. They are
   meant to used as backup devices.
 - "Surveillance" hard disks are middling to poor reliability, and slow to
   access.

Hard disk vendors will generally indicate which grade a hard disk is. "NAS" or
"Server" would be the ideal one to buy, but they can be expensive. Moreover,
these are usually available as "internal" hard disks, intended to be used in a
PC or a NAS device. 

The "Desktop" hard disks are cheaper, and coupled with a good backup solution
can be suitable to most pockets. Most USB portable hard disks are desktop hard
disks.

### Power for Hard Disks

A note of caution on hard disk power. Portable hard disks, which connect
to USB, are cheap and work well. The biggest downside with these hard disks is
that they draw power from the USB host. In the case of SBCs, the SBC power
supply has to now provide power to the SBC as well as the hard disk, which can
cause it to stretch and either fail, or cause the hard disk to fail. 

The better option is to use USB hard disks which have their own power supply.
These are generally marketed as desktop backup solutions, which means they
generally have "archival" disks inside. This is not a bad thing, but just
something to keep in mind.

## Speed

A faster processor is always great, but the processor is almost never the weak
link. Beyond a point, the processor's capability is restrained by other
factors.

### Network speed

When talking about networking, there are two forms that are generally used in
home networking: **Wired** and **Wireless**.

For **Wired**, When possible, always choose gigabit Ethernet, or better. Some
newer SBCs offer 2.5G Ethernet. This standard is not very popular, and unless
the switch / router connecting to the computer also supports this, the speed
will negotiate to the least common option, which is gigabit Ethernet. Avoid
"fast" Ethernet because, despite its name, it is only one-tenth the speed of
Gigabit Ethernet.

Avoid **Wireless** entirely if possible. Wireless is a very finicky protocol
for sustained data transfer speeds. There are too many variables, like antenna
position, interference, and the presence of obstacles. Switching on a
microwave oven will suddenly see speeds drop or disconnect entirely, even if
the oven is nowhere near the endpoints!

If **Wireless** is the only option, wireless AC is reasonably fast and
widespread, though WiFi 6, or AX standard is also reasonably popular. It is,
of course, mandatory that the access-point/router also support AX to reap the
benefit of the newer standard.

### Storage Connectivity

We spoke about SSDs and HDDs earlier, but it is equally important how the
storage connects to the computer.

USB1.0 is about 1.5Mbps, and USB1.1 12Mbps. You will only find these in older
hardware. Do not use these for storage connectivity under any circumstances.
The ports are best reserved for keyboards/mice.

Typically, external hard disks spin at 5400RPM, which allows them to operate
up to 100 MB/s. The high speed 7200RPM disks put out about 125 MB/s.

USB2.0 is also old, and rated at 480Mbps. In reality, this translates to about
25MB/s with any hard disk.

Most newer external hard disks come with a USB3.x interface, which is the
newest standard. The real world speed of the interface is much higher than the
hard disk itself, so the interface is not the bottleneck. Speeds of over 80
MB/s are not unusual with USB3.0.

If the computer offers the option, use a SATA interface for the hard disk.
SATA is a purpose built interface for hard disks and SSDs, and offers much
higher speeds than USB, which is a generic standard.

The newest standard is M.2, which is a standard for both storage and
networking, but the speeds it offers are even higher than SATA. If the options
are available, select M.2 first, else SATA, and failing that USB3.

One more note on USB. Multiple devices can be connected to a single port using
a hub. First, ensure that the hub is also of the same type. If the port and
hard disk are both USB3, but the hub is USB2, the overall speed is USB2.
Second, hubs draw power, as do any devices connected to it. If the USB device
is powered from the computer, it may help to have a powered hub.

## To Sum Up...

Bare minimum: We need something with...

- A reasonably fast processor. 64-bit for sure, but ARM/x86 does not matter.
- A good amount of memory. We could make do with 2GB, though. That would be the minimum
- Doesn't need a fan. Or, if unavoidable, has a very quiet fan.
- Ethernet. Always better than WiFi.
- Storage. Any sort.   

The ideal specification would, in addition, have:

- 8GB+ of memory.
- M.2 interface. SATA, if M.2 unavailable. USB3, if SATA unavailable.
- SSD storage. Any sort. HDD for infrequent access, and huge volumes
- A very good power supply solution.
- Uninterrupted power.
