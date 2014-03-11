"""Fabric deployment tasks for newspaper sites"""

from StringIO import StringIO
from os import path
from fabric.api import env, execute, local, put, sudo, task, hosts, runs_once, hide, run, cd
from fabric.contrib.project import rsync_project
from fabric.contrib.files import append, exists, comment, sed
from fablib import chput, mkdir, pickrole
from fabric.colors import green, yellow


@task
@runs_once
def all(setup=False, pull=False):    
    """Run all deployment tasks"""    
    execute(framework)
    print green('web application deployed succesfully.')


@task
def framework(pull=False):
    """Push framework updates"""
    role = pickrole(env.webapps, strict=True)
    # rsync Yii framework and shared packages
    rsync_project(
        '{}/'.format(env.base),
        delete=True,
        ssh_opts='-o StrictHostKeyChecking=no',
    )
