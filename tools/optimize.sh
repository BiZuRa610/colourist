#!/usr/bin/env bash
# ==============================================================================
# Colourist by Zerlinda — Media Optimization Helper Script (ffmpeg)
# Compress videos and generate first-frame posters for zero audio and fast start.
# Note: DO NOT run automatically during builds; run manually when preparing assets.
# ==============================================================================

set -euo pipefail

INPUT="${1:-}"
OUTPUT="${2:-}"

if [ -z "$INPUT" ]; then
  echo "Usage: ./tools/optimize.sh <input.mp4> [output.mp4]"
  echo ""
  echo "Example Commands:"
  echo "  # 1. Compress video (720p height, crf 26, no audio, faststart for streaming):"
  echo "  ffmpeg -i in.mp4 -vf scale=-2:720 -c:v libx264 -crf 26 -preset slow -an -movflags +faststart out.mp4"
  echo ""
  echo "  # 2. Extract high quality first frame poster:"
  echo "  ffmpeg -i in.mp4 -frames:v 1 -q:v 3 poster.jpg"
  exit 1
fi

if [ -z "$OUTPUT" ]; then
  DIR=$(dirname "$INPUT")
  BASE=$(basename "$INPUT" .mp4)
  OUTPUT="${DIR}/${BASE}_optimized.mp4"
  POSTER="${DIR}/${BASE}_poster.jpg"
else
  DIR=$(dirname "$OUTPUT")
  BASE=$(basename "$OUTPUT" .mp4)
  POSTER="${DIR}/${BASE}_poster.jpg"
fi

echo "==> Optimizing $INPUT -> $OUTPUT"
ffmpeg -y -i "$INPUT" -vf "scale=-2:720" -c:v libx264 -crf 26 -preset slow -an -movflags +faststart "$OUTPUT"

echo "==> Generating poster -> $POSTER"
ffmpeg -y -i "$INPUT" -frames:v 1 -q:v 3 "$POSTER"

echo "==> Done!"

