user-access-manager
===================

_user-access-manger_ is a wordpress plugin.
The original documentation can be found here: [user-access-manager](https://wordpress.org/plugins/user-access-manager/)

The master branch is used as a 'mirror' of the [svn repository](http://plugins.svn.wordpress.org/user-access-manager/)
This is achieved through the tool: [svn2git](http://plugins.svn.wordpress.org/user-access-manager/)
The .git/config file should have the following format:

```ini
[core]
        repositoryformatversion = 0
        filemode = true
        bare = false
        logallrefupdates = true
[svn-remote "svn"]
        noMetadata = 1
        url = http://plugins.svn.wordpress.org/user-access-manager
        fetch = trunk:refs/remotes/svn/trunk
        branches = branches/*:refs/remotes/svn/*
        tags = tags/*:refs/remotes/svn/tags/*
[user]
[remote "origin"]
        url = https://github.com/nwoetzel/user-access-manager.git
        fetch = +refs/heads/*:refs/remotes/origin/*
        push = refs/heads/wp-cli:refs/heads/wp-cli
        push = refs/heads/master:refs/heads/master
[branch "master"]
        remote = origin
        merge = refs/heads/master
[branch "taxonomy"]
        remote = origin
        merge = refs/heads/taxonomy
[remote "svn"]
        url = http://plugins.svn.wordpress.org/user-access-manager
        fetch = +refs/*:refs/*
[user]
[branch "dev"]
        remote = origin
        merge = refs/heads/dev
```

and regularly calling `svn2git --rebase` on the master branch will pull in the changes from the trunk, branches and even the new tags. These need to be committed to the origin after they have been applied locally by svn2git.