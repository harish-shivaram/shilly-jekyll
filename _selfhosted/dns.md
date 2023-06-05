---
title: A DNS hosting provider
description: The domain name system... what it is, why we need it and how to go about doing that 
lastmod: 2023-05-25
image: /images/selfhosted/dns.jpg
sequence: 2
toc: true
---

## What is DNS?

When you click on a link like [this](https://www.google.com), or type in a URL
in a browser's address bar, the DNS (domain name system) provides the browser
with a set of numbers, which are internet co-ordinates to reach the server.
These co-ordinates are called the "IP address", and the DNS infrastructure is
an internet-wide directory which translates a domain name to an IP address.

It goes without saying that DNS is crucial to how the internet is used. Without
DNS, it would be impossible to reach the millions of websites, or send email,
or do just about anything on the internet. This is because remembering a domain
name like [www.google.com](https://www.google.com) is much easier than
remembering a series of numbers like `142.250.183.228`. Another problem is that
while the domain name can stay the same, the addresses can change.

The first step to self-hosting anything is to set up the infrastructure to
reach the self-hosted services on the internet. To do this, we need to register
a domain name.

Domain names are a word, phrase, or string that is used for navigating the
Internet. They are registered to individuals or legal entities in lengths of
years for a set fee, dictated by the hosting provider and ICANN.

They are divided into levels, where each level is separated by a period (dot).
Typically, domain registrations include the top-level and second-level portion
of a domain. All levels below are controlled by DNS at the discretion of the
domain registrant, the person who owns the domain.

Top-level domains (TLDs) are .com, .net, .info, .edu, .org, etc. The
customizable part of the domain name, the part that is typically "registered"
and assigned to an owner, is called the second-level domain. Third-level
domains are referred to as subdomains. Generally, the owner of the second-level
domain may create as many subdomains as they wish.

For example, in each of these three URLs,
[www.google.com](https://www.google.com),
[photos.google.com](https://photos.google.com) and
[keep.google.com](https://keep.google.com), `.com` is the TLD, `google` is the
second-level domain, and `www`, `photos` and `keep` are the subdomains.

## Why DNS for self-hosting?

In short, easy access. 

Your self-hosted services will most likely be running off a server device at
home. Accessing the services within your home would be simple, since that is a
private network. The device is on your home network, and have a fixed address
assigned by you.

But accessing the same services, outside of home, becomes much harder. For
one, you would need to use the IP address provided by your internet provider.
This address is likely to change frequently, and moreover, it would be a
random sequence of numbers, unlike the well known address assigned in your
home network. 

Having your own domain name to easily access your services would be very
desirable, but this is also comes at a price.  Unlike everything else used for
self-hosting, DNS is a recurring investment, since you own the domain only for
a fixed period of time, and you would need to pay a subscription. 

If you are just dabbling in self-hosting, then DNS registration can wait.

## Registering

DNS hosting services are provided by several companies on the internet. The
companies typically offer a handful of top-level domains to choose from, and
the registrant may choose any second-level domain that is available. The
payment made is for ownership of the second-level domain for a fixed period,
usually in multiples of years.

Historically, there were just a handful of common TLDs, and country-specific
TLDs. Among the common ones, `.com` was intended to indicate that the domain is
registered to a commercial entity, whereas `.org` was intended for non-profit
organisations. This distinction is no longer adhered to, and more recently,
several common (non-country specific) TLDs are available. Each TLD has a
pricing based on demand.

Once the domain is registered, the hosting service typically provides a web
interface to the registrant to configure the rules to translate the domain name
to IP addresses.

While this is all well and good, it does provide a problem for self-hosting.
Internet service providers often give their clients a random IP address from a
pool that they own. So if a user manually configures his IP address on the
hosting services' website, the process would have to be repeated every time the
address changes. This could be once a week, or once every time the internet is
accessed, which could be as frequent as once an hour.

Fortunately, there are tools which automate the process of updating the IP
address. Often, hosting providers themselves provide such software tools, but
using such a tool would require a specific type of server, or operating system,
and is often intrusive. A generic tool which does the job is called
[ddclient](https://ddclient.net/). It supports several methods of updating the
address automatically, across several hosting providers.

Ensure that documentation is available to configure ddclient for the hosting
provider you select. This should be a higher consideration than the pricing
when selecting the provider.

Personally, I use [NameCheap](https://www.namecheap.com/). They may not be the
cheapest, but I like their interface and they support ddclient based IP
updates.

## Configuring

There are different types of records that can be defined in the domain name
server. The four most commonly used types are:
 - **A** and **AAAA**: These are the IP address records. The single A is used
   for IPv4 and the AAAA for IPv6.
 - **CNAME**: Canonical name. This indicates that this record is an alias, or
   an alternate name for another record.
 - **MX**: Mail exchanger. These point to servers which handle the email for
   any address ending with @secondleveldomain.tld
 - **NS**: Nameserver. This indicates that this domain, and all subdomains
   under it are served by the specified nameserver.

The tools we spoke about earlier essentially update the "**A**" records, which
point to the actual IP address of the server providing the self-hosting.

We shall talk more about configuring DNS records later. Most DNS hosting
providers have a setting to make the domain point to a parking page, something
like "Under Construction". Until some of the self-hosting infrastructure is up
and in place, it is best to enable the parking page, and leave that on.
