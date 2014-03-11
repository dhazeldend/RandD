"""Fabric deployment helper functions"""
try:
    from setuptools import setup
except:
    from distutils.core import setup

setup(
    name="fablib",
    version="0.1.0",
    description=__doc__,
    author="Jacques Coetsee",
    author_email="jacques@touchlab.co.za",
    py_modules=['fablib'],
)
