---
title: An Audiophile's Raspberry
image: /images/selfhosted/audiorpi.jpg
toc: true
sequence: 6
lastmod: 2023-05-28
description: A Raspberry Pi is a perfect device to cobble together an excellent audiophile grade digital audio source. Some HAT's and a few custom-built audio distributions complete the package.
---

## Disclaimer: "Audiophile"

Honestly, a true blue audiophile isn't someone who appreciates good music. They are obsessed with the purity of sound and having incredibly expensive equipment, which they obsessively keep upgrading to the next greatest thing. They look on the digital music world with disdain, and swear by tube amplifiers and vinyl records.

In that context, I am not an audiophile. But I do listen to a wide range of music, and I want the music to sound good. I think digital music is a wonderful idea, and I really think it sounds as good, if not better than the average "analogue" source. I love that digital music can be streamed over the internet, and how a humble pen drive can hold more music than I can listen to in a week. I digitized my collection, with CD's ripped into FLAC's and MP3's, but for the most part, I was listening to music on a good set of speakers connected to a desktop ([harmon/kardon Soundsticks](https://www.harmankardon.com/computer-speakers/SOUNDSTICKS+III.html)).

The speakers were great, truly high fidelity. I could hear all the nuances of the music, and I could distinguish the a good digital rip versus a bad one. But unfortunately, a crazy voltage spike toasted the speakers and I was listening to music on earphones for the longest.

Eventually I picked up a good stereo amplifier (The [NAD D 3020](https://nadelectronics.com/product/d-3020-hybrid-digital-amplifier/)) and a lovely pair of bookshelf speakers. The amplifier has a USB input with a built-in DAC, which is substantially better quality than a regular common or garden DAC. The manufacturer had intended this to be connected to a PC or similar, where the amplifier would show up as an external USB sound card.

Enter the Raspberry Pi. I picked up a second-hand Raspberry Pi 2 off of some online site. Hooking up one of the USB ports to the amplifier is simple enough, the next step is to have a headless device work as an easy to use audio source. There are a couple of Raspberry distributions specifically meant for audio.

## MPD and RompR

This was the first attempt at cobbling together a dedicated headless music player. MPD has all the necessary features for managing music and playlists, and maintaining collections. And of course, it plays pretty much every music format.

This whole approach, though it worked, was not sustainable. RompR, though very elegant, was not responsive. And it was not maintained actively.

While looking for a more up to date web interface, I came across my next solution... Volumio.

## Volumio

The first one I tried was [Volumio](https://volumio.com/). This is simple, elegant, and has a beautiful interface. The music collection could be stored on an attached storage device, or a network store. This worked well for a while, but there were a few caveats

- Volumio has an odd underlying design, where it uses mpd to play the song, but does not use any other mpd features, like collection maintenance, playlist management etc. As a result, I cannot use any regular MPD compatible clients effectively.

- Volumio's web interface is a nice responsive interface, but the web interface is the only available interface. Remote access, scripting, etc., are tricky.

- Playlists are tricky to build and maintain, and importing pre-made playlists is a little convoluted, or impossible.

- Volumio does not do (or, did not, at the time I evaluated it) internet radio channels.

All told, I did use Volumio for quite a while. There is a companion app, but it turned out to be just a browser shortcut to Volumio's web interface. Eventually, the limitations of Volumio got too hard to manage.

## moOde audio player

There were perhaps some other distributions I considered evaluating while I was looking at an alternative to Volumio, but I never got to those.

moOde is exactly was I was looking for, and ticks all the buttons. It has a nice and responsive interface, even if not as elegant as Volumio or RompR. It uses MPD under the hood, and all the the features of MPD. It provides a web interface to manage everything like MPD configuration, kernel version, file system management etc. 

It comes with a very nice collection of several pre-configured radio stations to suit every genre and mood (see what I did there :). moOde is well maintained, and updates with bug fixes and new features regularly.

Some of the clients I use are:
 - MPDluxe on iOS
 - M.A.L.P on Android
 - ncmpcpp on Linux console.

I used the NAS as the primary music store for a while, then later switched to having a directly connected hard disk instead, so the NAS acts as a backup instead.

One more thing: moOde is essentially a full graphical installation of Raspberry Pi OS underneath, and has all the bells and whistles that comes with. I additionally use the device for other tasks like command line collection management, backups, and trans-coding.

## HiFiberry Digi+

This configuration worked very well for a while, but eventually the volume control on the amplifier stopped working. This necessitated upgrading the amplifier, and I switched to the [NAD C 338](https://nadelectronics.com/product/c-338-classic-digital-dac-amplifier/). This was a nicer amplifier than the previous one, with built in networking and Google cast etc., but it lacked a USB input interface.

To circumvent that, I got a raspberry PI HAT called the [Hifiberry Digi+](https://www.hifiberry.com/shop/boards/hifiberry-digiplus-standard-version/).  It provides two S/PDIF interfaces (optical and coaxial), allowing me the ability to feed a digital signal directly to the amplifier and leverage the amplifier's DAC again, like before.

MoOde player allowed me to simply select the output device from a list of supported devices in a drop-down menu in the web interface. It automatically reconfigured both the Linux system (ALSA) and MPD to use the Digi+ instead.

I used both the coaxial and the optical, there's nothing to choose from in audio quality or convenience between the two.

So there you have it. Raspberry Pi is a perfect high-fidelity digital audio source.
