.PHONY: all

all: test

test:
	@skernel build --debug
	@chmod +x target/release/bin
	@target/release/bin start