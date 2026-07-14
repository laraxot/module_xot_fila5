---
title: "Sail"
module: "Xot"
type: concept
tags: [sail]
created: 2026-07-14
updated: 2026-07-14
qmd: "sail"
related:
  - "./eloquent-magic-properties-rule.md"
---
Bind for 0.0.0.0:3306 failed: port is already allocated
------------------
Error starting userland proxy: listen tcp4 0.0.0.0:80: bind: address already in use
sudo lsof -i :80
sudo service apache2 stop

----

dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all /norestart
Enable-WindowsOptionalFeature -Online -FeatureName Microsoft-Windows-Subsystem-Linux
